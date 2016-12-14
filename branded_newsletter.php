<?php

/*
Do Once: Load Image Bespoke Block

For All:
  Load Branded Template
  Remove Styles At Top
  Insert String into String Between Content Markers
  Save To File
*/

function branded_newsletter(){
  foreach (glob("*/templates/*_branded.html") as $filename) {
    $template = file_get_contents($filename);

    $template = preg_replace('/\{.*?\}/ms', '', $template);
    //print_r($filename . "<br/>");
    $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);
    //print_r($parentFolder . "<br/>");

    $oneCol = file_get_contents($parentFolder . "\/bespoke blocks\/" . $parentFolder . "_1_col.html");
    $twoCol = file_get_contents($parentFolder . "\/bespoke blocks\/" . $parentFolder . "_2_col.html");

    $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";

    $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $oneCol . $twoCol . "<!-- User Content: Main Content End -->", $template);

    $filename = preg_replace('/.*?\/.*?\//', '', $filename);
    $filename = str_replace('.html', '', $filename);

    print_r($output);

    $outputPath = "pre_made/branded_newsletter/";
    $append = "_newsletter";
    $fileType=".html";
    //print_r($outputPath . $filename . $append . $fileType);

    file_put_contents(($outputPath . $filename . $append . $fileType), $output);
  }
}
 ?>
