<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


require __DIR__.'/vendor/autoload.php';

use App\Model\CallRecord;
use App\Model\CallRecordObjectConverter;
use App\Model\ParserFactory;
use App\Model\Parsers\CsvParser;
use App\Model\ReaderFactory;
use App\Model\ResultConverter\CustomerResult;
use App\Model\ResultDataConverter;


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

        $callRecords = (new CallRecordObjectConverter($parser->getData()))->convertToCallRecordObject();

        /** @var CustomerResult[] $customerResults */
        $customerResults = (new ResultDataConverter(...$callRecords))->getCustomerResults();

        $html = '';

        $html .='<table>';
        foreach ($customerResults as $customerResult){
            $html .='<tr>';
            $html .='<td>'.$customerResult->getCustomerId().'</td>';
            $html .='<td>'.$customerResult->getNumberOfCallsWithinTheSameContinent().'</td>';
            $html .='<td>'.$customerResult->getTotalDurationOfCallsWithinTheSameContinent().'</td>';
            $html .='<td>'.$customerResult->getTotalNumberOfAllCalls().'</td>';
            $html .='<td>'.$customerResult->getTotalNumberOfAllCalls().'</td>';
            $html .='</tr>';
        }
        $html .='</table>';
        echo $html;
        die;
    }
}else{

    echo '
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file">
    <button type="submit">Submit</button>
</form>
';

}

