<?php

ini_set('max_execution_time', 3000);

function sendToFile($output, $append, $serverName){
  $send = true;
  if($send == true){
    $outputPath = "client.demo/";
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

function textColor($color){
  $r = hexdec(substr($color,1,2));
  $g = hexdec(substr($color,3,2));
  $b = hexdec(substr($color,5,2));

  if ($r + $g + $b > 500){
    //return $r + $g + $b;
      return '#000';
    } else {
      //return $r + $g + $b;
      return '#fff';
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

function marginBuilder($block){
  $blockStart = '<table border="0" cellpadding="0" cellspacing="0" width="600" class="block block1Column structureBlock wrapper" data-id="block1Column" style="width:600px;width:600px;width:600px;">
      <tr>
          <td align="center" valign="0">
              <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table blockArea block" data-id="blockArea" style="width:600px;width:600px;width:600px;">
                  <tr><td align="center" width="30"></td>
                      <td valign="top">';
  $blockEnd = '</td><td align="center" width="30"></td>
  </tr>
  </table>
  </td>
  </tr>
  </table>';

  $block = $blockStart . $block .$blockEnd;
  return $block;
}

//http://placehold.it/640x360

$column = file_get_contents("flares/_defaults/1column.html");
$imageBlock = file_get_contents("flares/_defaults/image.html");
$imageBlock = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://placehold.it/640x360', $imageBlock);

foreach (glob("*/templates/*_branded.html") as $filename) {
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);

  print_r($template);
}
 ?>
