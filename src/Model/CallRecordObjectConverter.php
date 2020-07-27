<?php

declare(strict_types=1);

namespace App\Model;

class CallRecordObjectConverter
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;

    }

    /**
     * @return CallRecord[]
     */
    public function convertToCallRecordObject(): array
    {
        return  array_map(function (array $item) {
            return new CallRecord(
                (int)$item['customer_id'],
                (string)$item['call_date'],
                (int)$item['duration_in_second'],
                (string)$item['dialed_phone_number'],
                (string)$item['customer_ip']
                );
        }, $this->data);
    }
}