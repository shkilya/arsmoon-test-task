<?php
declare(strict_types=1);

namespace App\Model\Parsers;

class CsvParser implements ParserInterface
{
    /**
     * @var array
     */
    private $header;

    /**
     * @var array
     */
    private $csvData;

    /**
     * @param array $header
     */
    public function setHeader(array $header): void
    {
        $this->header = $header;
    }

    /**
     * @param $content
     */
    public function parse($content): void
    {
        $lines   = explode(PHP_EOL, $content);

        $header = $this->header;
        if(empty($header)){
            $header = array_shift($lines);
        }
        $csvData = [];
        foreach ($lines as $line) {
            if($csvDataIte = array_combine($header,str_getcsv($line))){
                $csvData[] = $csvDataIte;
            }

        }
        $this->csvData = $csvData;
    }

    public function getData()
    {
        return $this->csvData;
    }
}