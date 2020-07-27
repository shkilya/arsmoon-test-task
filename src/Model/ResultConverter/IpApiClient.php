<?php

declare(strict_types=1);

namespace App\Model\ResultConverter;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;

/**
 * Class IpApiClient
 * @package App\Model\ResultConverter
 */
class IpApiClient
{
    /**
     *
     */
    private const  IP_STACK_API_URL = 'http://api.ipstack.com/';
    /**
     *
     */
    private const  IP_STACK_API_KEY = "3c239e4d8288c966ba689fb3e03fac57";
    /**
     * @var string
     */
    private $ip;

    /**
     * IpApiClient constructor.
     * @param string $ip
     */
    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getIpResult(): ?IpApiResult
    {
        $client = new Client([
            'base_uri' => $this->getIpStackApiUrl(),
        ]);

        $response = $client->request('GET', $this->ip, [
            'query' => [
                'access_key' => $this->getIpStackApiKey()
            ]
        ]);

        $data = $response->getBody()->getContents();

        $serializer = SerializerBuilder::create()->build();
        return $serializer->deserialize($data, IpApiResult::class, 'json');

    }

    /**
     * @return string
     */
    private function getIpStackApiUrl(): string
    {
        return self::IP_STACK_API_URL;
    }

    /**
     * @return string
     */
    private function getIpStackApiKey(): string
    {
        return self::IP_STACK_API_KEY;
    }

}