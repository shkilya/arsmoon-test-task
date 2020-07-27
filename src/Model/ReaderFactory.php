<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\Reader\FileReader;
use App\Model\Reader\HttpReader;
use App\Model\Reader\ReaderInterface;

/**
 * Class ReaderFactory
 * @package App\Model
 */
class ReaderFactory
{
    public const FILE_READER = 'FILE_READER';
    public const HTTP_READER = 'HTTP_READER';

    /**
     * @param string $readerType
     * @return ReaderInterface
     */
    public function createReader(string $readerType) : ReaderInterface
    {
        if($readerType == self::FILE_READER){
            return new FileReader();
        }elseif($readerType == self::HTTP_READER) {
            return new HttpReader();
        }else{
            return new FileReader();
        }
    }
}