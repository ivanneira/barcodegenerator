<?php
/*
require_once('class/BCGFontFile.php');
require_once('class/BCGColor.php');
require_once('class/BCGDrawing.php');

// Including the barcode technology
require_once('class/BCGcode39.barcode.php');

// Loading Font
$font = new BCGFontFile('./font/Arial.ttf', 18);

if(isset($_GET['code'])) {
    $code =  $_GET['code'];

    generateBarcode($code);

} else {
    //echo "error en la petición";
    generateBarcode("123");

}

function generateBarcode($text){

    // The arguments are R, G, B for color.
    $color_black = new BCGColor(0, 0, 0);
    $color_white = new BCGColor(255, 255, 255);

    $drawException = null;
    try {
        $code = new BCGcode39();
        $code->setScale(2); // Resolution
        $code->setThickness(30); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
        $code->parse($text); // Text
    } catch(Exception $exception) {
        $drawException = $exception;
    }


    $drawing = new BCGDrawing('', $color_white);
    if($drawException) {
        $drawing->drawException($drawException);
    } else {
        $drawing->setBarcode($code);
        $drawing->draw();
    }

    // Header that says it is an image (remove it if you save the barcode to a file)
    header('Content-Type: image/png');
    header('Content-Disposition: inline; filename="barcode.png"');

    // Draw (or save) the image into PNG format.
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);


}
*/

<?php
//For displaying barcodes

//Arguments are:
//  code    Number you want outputted as a barcode

//You can use this script in two ways:
//  From a webpage/PHP script   <img src='/images/barcode.php?code=12345'/>
//  Directly in your web browser    http://www.example.com/images/barcode.php?code=12345

//Outputs the code as a barcode, surrounded by an asterisk (as per standard)
//Will only output numbers, text will appear as gaps
//Image width is dynamic, depending on how much data there is

//Get the barcode font (called 'free3of9') from here http://www.barcodesinc.com/free-barcode-font/

header("Content-type: image/png");
$file = "images/barcode.png"; // path to base png image
$im = imagecreatefrompng($file); // open the blank image
$string = $_GET['code']; // get the code from URL
imagealphablending($im, true); // set alpha blending on
imagesavealpha($im, true); // save alphablending setting (important)

$black = imagecolorallocate($im, 0, 0, 0); // colour of barcode

$font_height=40; // barcode font size. anything smaller and it will appear jumbled and will not be able to be read by scanners

$newwidth=((strlen($string)*20)+41); // allocate width of barcode. each character is 20px across, plus add in the asterisk's
$thumb = imagecreatetruecolor($newwidth, 40); // generate a new image with correct dimensions

imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, 40, 10, 10); // copy image to thumb
imagettftext($thumb, $font_height, 0, 1, 40, $black, 'c:\windows\fonts\free3of9.ttf', '*'.$string.'*'); // add text to image

//show the image
imagepng($thumb);
imagedestroy($thumb);
