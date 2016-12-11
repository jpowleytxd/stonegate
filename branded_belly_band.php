<?php

/*
Do Once: Load Image Bespoke Block

For All:
  Load Branded Template
  Remove Styles At Top
  Insert String into String Between Content Markers
  Save To File
*/

$imageBlock = file_get_contents("flares/_defaults/image.html");

foreach (glob("*/templates/*.html") as $filename) {
  $template = file_get_contents($filename);

  $template = preg_replace('/\{.*?\}/ms', '', $template);
}

 ?>
