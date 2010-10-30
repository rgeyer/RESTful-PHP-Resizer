<?php

$timerStart=time();

$imagick = new Imagick();
$imagick->readImage($_FILES['picture']['tmp_name']);

// Find the largest dimension to determine orientation
$height = $imagick->getImageHeight();
$width = $imagick->getImageWidth();
$orientation = 'unknown';

if ($width == $height) { $orientation = 'square'; }
else if ($width > $height) { $orientation = 'landscape'; }
else if ($height > $width) { $orientation = 'portait'; }

$largestSide = ($orientation == 'portait') ? $height : $width;

$scaleRatio = floatval($largestSide / $_REQUEST['largestDimInPx']);

$newWidth = intval($width/$scaleRatio);
$newHeight = intval($height/$scaleRatio);

$imagick->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, -2);

$timerEnd=time();
$timeDelta = $timerEnd - $timerStart;

header('Content-type: image/jpeg');
header("Stats-MsElapsed: $timeDelta");
header("Stats-UnixTsStart: $timerStart");
header("Stats-UnixTsEnd: $timerEnd");
foreach($_REQUEST['param'] as $idx => $param) {
  header("PASSTHRU-$idx: $param");
}

echo $imagick;