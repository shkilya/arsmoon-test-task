<?php
declare(strict_types=1);

namespace App\Model\Reader;

/**
 * Interface ReaderInterface
 * @package App\Model\Reader
 */
interface ReaderInterface
{
    /**
     * @param $request
     */
    public function read($request): void;

    /**
     * @return ContextInterface
     */
    public function createContext(): ContextInterface;
}