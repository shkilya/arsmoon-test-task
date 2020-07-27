<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\ResultConverter\CustomerResult;
use App\Model\ResultConverter\IpApiClient;
use App\Model\ResultConverter\RecordByCustomer;

class ResultDataConverter
{
    /**
     * @var CallRecord[]
     */
    private $callRecords;

    /**
     * ResultDataConverter constructor.
     * @param CallRecord ...$callRecords
     */
    public function __construct(CallRecord ...$callRecords)
    {
        $this->callRecords = $callRecords;
    }


    /**
     * @return CustomerResult[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCustomerResults(): array
    {
        $recordsByCustomer = [];
        foreach ($this->callRecords as $callRecord) {

            $ipApiResult = (new IpApiClient($callRecord->getCustomerIp()))->getIpResult();

            $recordsByCustomer[$callRecord->getCustomerId()][] = new RecordByCustomer(
                $ipApiResult->getContinentCode(),
                $callRecord,
                $callRecord->getCustomerId()
            );
        }


        $customResult = [];

        foreach ($recordsByCustomer as $customerId => $recordListByCustomer) {

            $durationInSeconds            = 0;
            $durationInSecondsByContinent = 0;
            $totalNumber                  = 0;
            $totalNumberByContinent       = 0;

            $callsByContinent = [];

            /** @var RecordByCustomer[] $recordListByCustomer */
            foreach ($recordListByCustomer as $item) {
                $durationInSeconds += $item->getCallRecord()->getDurationInSeconds();
                $totalNumber       += 1;

                $callsByContinent[$item->getContinentCode()][] = $item;
            }



            foreach ($callsByContinent as $callByContinent) {
                foreach ($callByContinent as $callByContinentItem) {
                    $durationInSecondsByContinent += $callByContinentItem->getCallRecord()->getDurationInSeconds();
                    $totalNumberByContinent       += 1;
                }
            }

            $customResult[] = new CustomerResult(
                $customerId,
                $totalNumberByContinent,
                $durationInSecondsByContinent,
                $durationInSeconds,
                $totalNumber
            );
        }

        return $customResult;
    }

}