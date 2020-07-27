<?php
declare(strict_types=1);

namespace App\Model\Parsers;

interface ParserInterface
{
    public function parse($content): void;

    public function getData();
}