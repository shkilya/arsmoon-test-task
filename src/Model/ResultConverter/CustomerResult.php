<?php
declare(strict_types=1);

namespace App\Model\ResultConverter;

class CustomerResult
{
    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var integer
     */
    private $numberOfCallsWithinTheSameContinent;

    /**
     * @var integer
     */
    private $totalDurationOfCallsWithinTheSameContinent;

    /**
     * @var integer
     */
    private $totalNumberOfAllCalls;

    /**
     * @var integer
     */
    private $theTotalDurationOfAllCalls;

    /**
     * CustomerResult constructor.
     * @param int $customerId
     * @param int $numberOfCallsWithinTheSameContinent
     * @param int $totalDurationOfCallsWithinTheSameContinent
     * @param int $totalNumberOfAllCalls
     * @param int $theTotalDurationOfAllCalls
     */
    public function __construct(int $customerId, int $numberOfCallsWithinTheSameContinent, int $totalDurationOfCallsWithinTheSameContinent, int $totalNumberOfAllCalls, int $theTotalDurationOfAllCalls)
    {
        $this->customerId                                 = $customerId;
        $this->numberOfCallsWithinTheSameContinent        = $numberOfCallsWithinTheSameContinent;
        $this->totalDurationOfCallsWithinTheSameContinent = $totalDurationOfCallsWithinTheSameContinent;
        $this->totalNumberOfAllCalls                      = $totalNumberOfAllCalls;
        $this->theTotalDurationOfAllCalls                 = $theTotalDurationOfAllCalls;
    }


    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @return int
     */
    public function getNumberOfCallsWithinTheSameContinent(): int
    {
        return $this->numberOfCallsWithinTheSameContinent;
    }

    /**
     * @return int
     */
    public function getTotalDurationOfCallsWithinTheSameContinent(): int
    {
        return $this->totalDurationOfCallsWithinTheSameContinent;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfAllCalls(): int
    {
        return $this->totalNumberOfAllCalls;
    }

    /**
     * @return int
     */
    public function getTheTotalDurationOfAllCalls(): int
    {
        return $this->theTotalDurationOfAllCalls;
    }
}
