<?php

if(isset($_GET['code'])) {
    $code =  $_GET['code'];


} else {
    //echo "error en la petición";
    $generator = new barcodegenerator\src\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
}