<?php

declare(strict_types=1);

namespace App\Model\Reader;

interface ContextInterface
{
    public function getContent();

    public function getType();
}