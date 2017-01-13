<?php

//http://placehold.it/600x800

ini_set('max_execution_time', 3000);

function sendToFile($output, $append, $serverName){
  $send = true;
  if($send == true){
    $outputPath = "pre_made/";
    $brand = '/branded/';
    $fileType=".html";

    $dirName = $outputPath . $serverName;
    if(!is_dir($dirName)){
      mkdir($dirName, 0755);
    }

    $dirName = $outputPath . $serverName . $brand ;
    if(!is_dir($dirName)){
      mkdir($dirName, 0755);
    }

    file_put_contents(($outputPath . $serverName . $brand . $append . $fileType), $output);
  }
}

function nameCheck($name){
  if($name === 'halfway_heaven'){
    $name = 'halfway_to_heaven';
    return $name;
  } else if($name === 'colors_basildon'){
    $name = 'colors';
    return $name;
  } else if($name === 'duke_wellington'){
    $name = 'duke_of_wellington';
    return $name;
  } else if($name === 'finnegans'){
    $name = 'finnegans_wake';
    return $name;
  } else if($name === 'pit_pendulum'){
    $name = 'pit_and_pendulum';
    return $name;
  } else{
    return $name;
  }
}

$imageBlock = file_get_contents("flares/_defaults/image.html");
$imageBlock = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://img2.email2inbox.co.uk/2016/stonegate/templates/eb_placeholder.jpg', $imageBlock);

foreach (glob("*/templates/*_branded.html") as $filename) {
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);

  $serverName = nameCheck($parentFolder);

  $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";

  $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $imageBlock . "<!-- User Content: Main Content End -->", $template);

  $append = "belly_band";

  sendToFile($output, $append, $serverName);

  print_r($output);
}
 ?>
