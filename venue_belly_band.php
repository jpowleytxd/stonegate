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
$imageBlock = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://img2.email2inbox.co.uk/2016/stonegate/templates/eb_placeholder.jpg', $imageBlock);

foreach (glob("*/templates/*_venue.html") as $filename) {
  $template = file_get_contents($filename);

  $template = preg_replace('/\{.*?\}/ms', '', $template);

  $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";

  $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $imageBlock . "<!-- User Content: Main Content End -->", $template);

  $filename = preg_replace('/.*?\/.*?\//', '', $filename);
  $filename = str_replace('.html', '', $filename);

  print_r($output);

  $outputPath = "pre_made/venue_belly_band/";
  $append = "_belly_band";
  $fileType=".html";

  file_put_contents(($outputPath . $filename . $append . $fileType), $output);
}

 ?>
