<?php

declare(strict_types=1);

namespace App\Model\ResultConverter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class IpApiResult
 * @package App\Model\ResultConverter
 */
final class IpApiResult
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $ip;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $hostname;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $continentCode;

    /**
     * IpApiResult constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getContinentCode(): string
    {
        return $this->continentCode;
    }


}