<?php

/*
Do Once: Load Image Bespoke Block

For All:
  Load Branded Template
  Remove Styles At Top
  Insert String into String Between Content Markers
  Save To File
*/

$block = file_get_contents("basic_layout.html");

foreach (glob("*/templates/*_branded.html") as $filename) {
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);
  //print_r($parentFolder . "<br/>");

  $filename = preg_replace('/.*?\/.*?\//', '', $filename);
  $filename = str_replace('.html', '', $filename);

  //print_r($filename . "<br/>");

  $outputPath = "/bespoke blocks/";
  $append = "_basic_layout.html";
  $output = $parentFolder . $outputPath . $parentFolder . $append;
  print_r($block);
  print_r($output . "</br>");

  file_put_contents(($output), $block);
}

 ?>
