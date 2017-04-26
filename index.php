<?php

if(isset($_GET['code'])) {
    $code =  $_GET['code'];


} else {
    //echo "error en la petición";

    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
}