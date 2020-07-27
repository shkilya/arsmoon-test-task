<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\Parsers\CsvParser;
use App\Model\Parsers\ParserInterface;
use App\Model\Parsers\XmlParser;

class ParserFactory
{
    public const CSV_TYPE = 'csv';
    public const XML_TYPE = 'xml';

    /**
     * @param string $dataType
     * @return ParserInterface
     * @throws \Exception
     */
    public function createParser(string $dataType ): ParserInterface
    {
        if ($dataType == self::CSV_TYPE) {
            return new CsvParser();
        } elseif ($dataType == self::XML_TYPE) {
            return new XmlParser();
        }else{
            throw new \Exception(sprintf('For %s data type parser not found',$dataType));
        }
    }
}