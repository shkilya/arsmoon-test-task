<?php

require __DIR__.'/vendor/autoload.php';

use App\Model\ParserFactory;
use App\Model\Parsers\CsvParser;
use App\Model\ReaderFactory;


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $readerFactory = new  ReaderFactory();

    $fileReader = $readerFactory->createReader(ReaderFactory::FILE_READER);

    $fileReader->read($_FILES["csv_file"]);
    $fileContext = $fileReader->createContext();

    $parserFactory = new ParserFactory();
    $parser = $parserFactory->createParser($fileContext->getType());

    if($parser instanceof CsvParser){
        /** @var CsvParser $parser */
        $parser->setHeader([
            'customer_id',
            'call_date',
            'duration_in_second',
            'dialed_phone_number',
            'customer_ip'
        ]);
        $parser->parse($fileContext->getContent());

        var_dump($parser->getData());
    }


    die;
}else{

    echo '
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file">
    <button type="submit">Submit</button>
</form>
';

}

