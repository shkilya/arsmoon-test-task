<?php
declare(strict_types=1);

namespace App\Model\Reader;

/**
 * Class FileReader
 * @package App\Model\Reader
 */
class FileReader implements ReaderInterface
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
     * @param $request
     */
	public function read($request) :void
	{
        $path_parts = pathinfo($request["name"]);
        $this->ext = $path_parts['extension'];
        $this->fileName = $path_parts['filename'];
        $this->size = $request['size'];
        $this->content = file_get_contents($request['tmp_name']);

	}

    /**
     * @return ContextInterface
     */
    public function createContext(): ContextInterface
    {
        return new FileContext(
            $this->content,
            $this->fileName,
            $this->ext,
            $this->size
        );
    }
}