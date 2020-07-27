<?php

declare(strict_types=1);

namespace App\Model\Reader;

class FileContext implements ContextInterface
{

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $ext;

    /**
     * @var integer
     */
    private $size;

    /**
     * FileContext constructor.
     * @param string $content
     * @param string $fileName
     * @param string $ext
     * @param int $size
     */
    public function __construct(string $content, string $fileName, string $ext, int $size)
    {
        $this->content  = $content;
        $this->fileName = $fileName;
        $this->ext      = $ext;
        $this->size     = $size;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getExt(): string
    {
        return $this->ext;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->ext;
    }
}
