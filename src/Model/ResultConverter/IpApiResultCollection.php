<?php


declare(strict_types=1);

namespace App\Model\ResultConverter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class IpApiResultCollection
 * @package App\Model\ResultConverter
 */
final class IpApiResultCollection
{
    /**
     * @var IpApiResult[]
     * @Serializer\Type("array<App\Model\ResultConverter\IpApiResult>")
     */
    private $ipApiResults;

    private function __construct()
    {
    }

    /**
     * @return IpApiResult[]
     */
    public function getIpApiResults(): array
    {
        return $this->ipApiResults;
    }
}