<?php
//die(phpinfo());
//header("location:http://impactle.com/");

use PHPImageWorkshop\ImageWorkshop;

require_once('/home/boundary/public_html/PHPImageWorkshop/ImageWorkshop.php');

$layer1 = ImageWorkshop::initFromPath('white-bg-and-border.jpg');
//$layer1->applyFilter(IMG_FILTER_CONTRAST, -15, null, null, null, true);

$layer4 = ImageWorkshop::initFromPath('character-1.jpg');
$layer1->addLayerOnTop($layer4, 20, 10, 'LC');


$layer2 = ImageWorkshop::initFromPath('impactle-logo.jpg');
//$layer2->opacity(50);

$layer1->addLayerOnTop($layer2, 20, 10, 'LB');

//$layer1->save(__DIR__, "6-9t.jpg", true, null, 95);

$text = "Your Words Here";
$fontPath = "/home/boundary/public_html/impactle.ttf";
$fontSize = 32;
$fontColor = "0000ff";
$textRotation = 0;
//$backgroundColor = "FF0000"; // optionnal
     
$layer3 = ImageWorkshop::initTextLayer($text, $fontPath, $fontSize, $fontColor, $textRotation, $backgroundColor);
$layer1->addLayerOnTop($layer3, 20, 20, 'LT');

$image = $layer1->getResult();

header('Content-type: image/jpeg');
header('Content-Disposition: filename="auto-impactle.jpg"');
imagejpeg($image, null, 95); // We choose to show a JPEG (quality of 95%)
exit;
?>
