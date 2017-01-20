<?php

ini_set('max_execution_time', 3000);

function sendToFile($output, $append){
  $send = true;
  if($send == true){
    $outputPath = "inserts/";
    $fileType=".txt";

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
foreach (glob("*/templates/*_branded.html") as $filename) {
    $temp = file_get_contents($filename);

    preg_match_all('/(.*?)\/(.*?)\/(.*?).html/', $filename, $matches);
    $parentFolder = $matches[1][0];

    $serverName = nameCheck($parentFolder);

    $templateName = $matches[3][0];
    $templateName = str_replace('branded', 'blank_template', $templateName);
    $templateName = str_replace($parentFolder, $serverName, $templateName);
    $templateName = str_replace('_', ' ', $templateName);
    $templateName = ucwords($templateName);

    //Remove comment tags
    $temp = preg_replace('/\{.*?\}/ms', '', $temp);
    $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);

    $temp = base64_encode($temp);

    $upperCaseName = str_replace('_', ' ', $serverName);
    $upperCaseName = ucwords($upperCaseName);

    $type = 'Blank Template';

    //$name = $upperCaseName . ' - T:' . date("Ymd") . ' -  ' . $type;

    $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
            ('1222', '" . $templateName . "', NULL, '" . $temp . "', NULL, NULL, '" . $type . "', NULL, '1');\n";
  }
  $append = "template-insert";

  sendToFile($sql, $append);

  print_r($sql);
?>
