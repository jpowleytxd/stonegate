<?php

ini_set('max_execution_time', 3000);

function sendToFile($output, $append){
  $send = false;
  if($send == true){
    $outputPath = "inserts/";
    $fileType=".sql";

    file_put_contents(($outputPath . $append . $fileType), $output);
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

$sql = null;
foreach (glob("*/bespoke blocks/*.html") as $filename) {
  $temp = file_get_contents($filename);

  preg_match_all('/(.*?)\/(.*?)\/(.*?).html/', $filename, $matches);

  $parentFolder = $matches[1][0];

  $serverName = nameCheck($parentFolder);

  $brand = str_replace('_', ' ', $serverName);
  $brand = ucwords($brand);

  $blockType = $matches[3][0];
  $blockType = str_replace($parentFolder . '_', '', $blockType);

  $lowerName = $blockType;
  $lowerName = str_replace('col', 'column', $lowerName);

  $blockType = str_replace('_', ' ', $blockType);
  $blockType = str_replace('col', 'column', $blockType);

  $blockType = ucwords($blockType);

  //Remove comment tags
  $temp = preg_replace('/\{.*?\}/ms', '', $temp);
  $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);

  $temp = base64_encode($temp);

  $upperCaseName = str_replace('_', ' ', $serverName);
  $upperCaseName = ucwords($upperCaseName);

  $lowerName = 'stonegate_' . $parentFolder . '_' .  $lowerName;

  $blockName = $upperCaseName . ' ' . $blockType;

  $sql .= "INSERT INTO `tbl_template_editor_blocks` (`block_name`, `block_account_id`, `block_type_id`, `block_type`, `block_html`, `block_category`) VALUES
          ('" . $blockName . "', '1222', '" . $lowerName . "', 'bespoke', '" . $temp . "', '" . $upperCaseName . "');\n";
}

$append = "bespoke-block-insert";

sendToFile($sql, $append);

print_r($sql);

?>
