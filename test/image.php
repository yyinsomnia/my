<?php
$image = imagecreatefromgif('http://www.php.net/images/php.gif');

$emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
imageconvolution($image, $emboss, 10, 127);

header('Content-Type: image/png');
imagepng($image, null, 9);
?>