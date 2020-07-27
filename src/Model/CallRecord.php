<?php
declare(strict_types=1);

namespace App\Model;

class CallRecord
{
    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var string
     */
    private $callDate;

    /**
     * @var integer
     */
    private $durationInSeconds;

    /**
     * @var string
     */
    private $dialedPhoneNumber;

    /**
     * @var string
     */
    private $customerIp;

    /**
     * CallRecord constructor.
     * @param int $customerId
     * @param string $callDate
     * @param int $durationInSeconds
     * @param string $dialedPhoneNumber
     * @param string $customerIp
     */
    public function __construct(int $customerId, string $callDate, int $durationInSeconds, string $dialedPhoneNumber, string $customerIp)
    {
        $this->customerId        = $customerId;
        $this->callDate          = $callDate;
        $this->durationInSeconds = $durationInSeconds;
        $this->dialedPhoneNumber = $dialedPhoneNumber;
        $this->customerIp        = $customerIp;
    }


    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getCallDate(): string
    {
        return $this->callDate;
    }

    /**
     * @return int
     */
    public function getDurationInSeconds(): int
    {
        return $this->durationInSeconds;
    }

    /**
     * @return string
     */
    public function getDialedPhoneNumber(): string
    {
        return $this->dialedPhoneNumber;
    }

    /**
     * @return string
     */
    public function getCustomerIp(): string
    {
        return $this->customerIp;
    }
}