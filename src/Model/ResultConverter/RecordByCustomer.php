<?php

declare(strict_types=1);

namespace App\Model\ResultConverter;

use App\Model\CallRecord;

/**
 * Class RecordsByCustomer
 * @package App\Model\ResultConverter
 */
class RecordByCustomer
{
    /**
     * @var string
     */
    private $continentCode;

    /**
     * @var CallRecord
     */
    private $callRecord;

    /**
     * @var integer
     */
    private $customerId;

    /**
     * RecordsByCustomer constructor.
     * @param string $continentCode
     * @param CallRecord $callRecord
     * @param int $customerId
     */
    public function __construct(string $continentCode, CallRecord $callRecord, int $customerId)
    {
        $this->continentCode = $continentCode;
        $this->callRecord    = $callRecord;
        $this->customerId    = $customerId;
    }

    /**
     * @return string
     */
    public function getContinentCode(): string
    {
        return $this->continentCode;
    }

    /**
     * @return CallRecord
     */
    public function getCallRecord(): CallRecord
    {
        return $this->callRecord;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }
}