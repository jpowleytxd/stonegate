<?php

ini_set('max_execution_time', 3000);

function sendToFile($output, $append, $serverName){
  $send = true;
  if($send === true){
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

function databaseQuery($query){
  //Define Connection
  static $connection;

  //Attempt to connect to the database, if connection is yet to be established.
  if(!isset($connection)){
    //Load congig file
    $config = parse_ini_file('config.ini');
    $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);
  }

  //Arrays to store all retrieved records
  $rows = array();
  $result = null;

  //Connection error handle
  if($connection === false){
    print('Connection Error');
    return false;
  } else{
    //Query the database
    $result = mysqli_query($connection, $query);

    //IF query failed, return 'false'
    if($result === false){
      print('Query Failed');
      return false;
    }

    //Fetch all the rows in the Array
    while($row = mysqli_fetch_row($result)){
      $rows[] = $row;
    }
    return $rows;
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

function getURL($serverName){
  $urlStart = 'http://img2.email2inbox.co.uk/2017/stonegate/01/promo/';
  $urlEnd = '/woo-woo.png';

  if(($serverName === 'finnegans_wake') || ($serverName === 'rosies') || ($serverName === 'two_brewers')){
    return $urlStart . 'colors' . $urlEnd;
  } else if(($serverName === 'halfway_to_heaven') || ($serverName === 'queens_court')){
    return $urlStart . 'charles_street' . $urlEnd;
  } else if(($serverName === 'marys')){
    return $urlStart . 'admiral_duncan' . $urlEnd;
  } else if(($serverName === 'pit_and_pendulum') || ($serverName === 'retro_bar') || ($serverName === 'rupert_street') || ($serverName === 'slains_castle') || ($serverName === 'via')){
    return $urlStart . 'beduin' . $urlEnd;
  }
  else{
    return $urlStart . $serverName . $urlEnd;
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

function termsBuilder($terms){
  $blockStart = '<table border="0" cellpadding="0" cellspacing="0" width="600" class="block block1Column structureBlock wrapper" data-id="block1Column" style="width:600px;width:600px;width:600px;">
      <tr>
          <td align="center" valign="0">
              <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table blockArea block" data-id="blockArea" style="width:600px;width:600px;width:600px;">
                  <tr><td align="center" width="30"></td>
                      <td valign="top">';
  $blockEnd = '</td><td align="center" width="30"></td>
  </tr><tr><td height="30" valign="0"></td></tr>
  </table>
  </td>
  </tr>
  </table>';

  $block = $blockStart . $terms .$blockEnd;
  return $block;
}

$initialQuery = 'SELECT * FROM iteration1';

$rows = databaseQuery($initialQuery);

$rowCount = null;

$birthdayRows = array();

foreach($rows as $key => $row){

  foreach($row as $i => $single){
    //var_dump($single);

    if($i === 0){
      if(strpos($single, 'Birthday') !== false){
        array_push($birthdayRows, $row);
        $rowCount++;
      }
    }
  }
}

//Birthday Rows Weel 1
foreach(glob("*/templates/*_branded.html") as $filename){
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);

  $serverName = nameCheck($parentFolder);

  //print($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');

  //Get Background Color
  preg_match('/"contentBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  $textColor = textColor($color);

  //Prep Heading
  $heading = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');
  $heading = str_replace('Heading goes here', $birthdayRows[0][3], $heading);
  $heading = str_replace('align="left"', 'align="center"', $heading);
  $heading = marginBuilder($heading);

  preg_match('/<h1.*?style="(.*?)".*?>/', $heading, $matches, PREG_OFFSET_CAPTURE);

  $headingStyle = $matches[1][0];
  $headingStyleNew = $headingStyle . ' font-size: 24px;';
  $heading = str_replace($headingStyle, $headingStyleNew, $heading);

  //Prep Image
  $image = file_get_contents('flares/_defaults/image.html');
  $promo = $image;
  $image = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://img2.email2inbox.co.uk/2016/stonegate/templates/placeholder.jpg', $image);

  //Prep Spacer
  $emptySpacer = file_get_contents('basic-spacer.html');
  $largeSpacer = str_replace('<td align="center" height="20" valign="middle"></td>', '<td align="center" height="40" valign="middle"></td>', $emptySpacer);

  //Prep All Text
  $basicText = file_get_contents('flares/_defaults/text.html');
  $textOne = $textTwo = $basicText;

  //Prep Text One
  $birthdayRows[0][4] = str_replace('"', '', $birthdayRows[0][4]);
  $textOne = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[0][4], $textOne);
  //$textOne = str_replace('"', '', $textOne);
  $textOne = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textOne);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textOne = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textOne);
  $textOne = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textOne);
  $textOne = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textOne);

  //Prep Promo Image
  $url = getURL($serverName);
  $promo = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', $url, $promo);
  $promo = marginBuilder($promo);


  //Prep Voucher
  $voucherInstructions = $birthdayRows[0][9];

  $voucher = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_voucher.html');
  $voucherSearch = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
  $voucher = str_replace($voucherSearch, $voucherInstructions, $voucher);

  $voucher = marginBuilder($voucher);

  //Prep Text Two
  $birthdayRows[0][7] = str_replace('"', '', $birthdayRows[0][7]);
  $textTwo = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[0][7], $textTwo);
  $textTwo = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textTwo);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textTwo = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textTwo);
  $textTwo = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textTwo);
  $textTwo = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textTwo);

  preg_match('/"emailBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  //print($color . ' : ');
  $textColor = textColor($color);
  //print($textColor . '<br/>');

  $terms = termsBuilder($birthdayRows[0][8]);
  $styleInsert = 'style="font-size: 11px; color: ' . $textColor . '"';
  $terms = preg_replace('/<td valign="top">/', '<td valign="top" align="center" ' . $styleInsert . '>', $terms);

  // print($terms);

  $insert = $image . $largeSpacer . $heading . $emptySpacer . $textOne . $emptySpacer . $promo .  $largeSpacer . $voucher . $largeSpacer . $textTwo . $largeSpacer;

  $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";
  $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $insert . "<!-- User Content: Main Content End -->", $template);

  $search = "/<!-- terms insert -->/";
  $output = preg_replace($search, $terms, $output);

  $append = "birthday_1_week";

  sendToFile($output, $append, $serverName);

  print_r($output);
}

//Birthday Rows Week - 2
foreach(glob("*/templates/*_branded.html") as $filename){
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);

  $serverName = nameCheck($parentFolder);

  //print($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');

  //Get Background Color
  preg_match('/"contentBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  $textColor = textColor($color);

  //Prep Heading
  $heading = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');
  $heading = str_replace('Heading goes here', $birthdayRows[1][3], $heading);
  $heading = str_replace('align="left"', 'align="center"', $heading);
  $heading = marginBuilder($heading);

  preg_match('/<h1.*?style="(.*?)".*?>/', $heading, $matches, PREG_OFFSET_CAPTURE);

  $headingStyle = $matches[1][0];
  $headingStyleNew = $headingStyle . ' font-size: 24px;';
  $heading = str_replace($headingStyle, $headingStyleNew, $heading);

  //Prep Image
  $image = file_get_contents('flares/_defaults/image.html');
  $promo = $image;
  $image = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://img2.email2inbox.co.uk/2016/stonegate/templates/placeholder.jpg', $image);

  //Prep Spacer
  $emptySpacer = file_get_contents('basic-spacer.html');
  $largeSpacer = str_replace('<td align="center" height="20" valign="middle"></td>', '<td align="center" height="40" valign="middle"></td>', $emptySpacer);

  //Prep All Text
  $basicText = file_get_contents('flares/_defaults/text.html');
  $textOne = $textTwo = $basicText;

  //Prep Text One
  $birthdayRows[1][4] = str_replace('"', '', $birthdayRows[1][4]);
  $textOne = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[1][4], $textOne);
  //$textOne = str_replace('"', '', $textOne);
  $textOne = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textOne);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textOne = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textOne);
  $textOne = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textOne);
  $textOne = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textOne);

  //Prep Promo Image
  $url = getURL($serverName);
  $promo = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', $url, $promo);
  $promo = marginBuilder($promo);


  //Prep Voucher
  $voucherInstructions = $birthdayRows[1][9];

  $voucher = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_voucher.html');
  $voucherSearch = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
  $voucher = str_replace($voucherSearch, $voucherInstructions, $voucher);

  $voucher = marginBuilder($voucher);

  //Prep Text Two
  $birthdayRows[1][7] = str_replace('"', '', $birthdayRows[1][7]);
  $textTwo = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[1][7], $textTwo);
  $textTwo = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textTwo);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textTwo = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textTwo);
  $textTwo = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textTwo);
  $textTwo = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textTwo);

  preg_match('/"emailBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  //print($color . ' : ');
  $textColor = textColor($color);
  //print($textColor . '<br/>');

  $terms = termsBuilder($birthdayRows[1][8]);
  $styleInsert = 'style="font-size: 11px; color: ' . $textColor . '"';
  $terms = preg_replace('/<td valign="top">/', '<td valign="top" align="center" ' . $styleInsert . '>', $terms);

  // print($terms);

  $insert = $image . $largeSpacer . $heading . $emptySpacer . $textOne . $emptySpacer . $promo .  $largeSpacer . $voucher . $largeSpacer . $textTwo . $largeSpacer;

  $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";
  $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $insert . "<!-- User Content: Main Content End -->", $template);

  $search = "/<!-- terms insert -->/";
  $output = preg_replace($search, $terms, $output);

  $append = "birthday_3_weeks";

  sendToFile($output, $append, $serverName);

  print_r($output);
}

//Birthday Rows Week - 6
foreach(glob("*/templates/*_branded.html") as $filename){
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);

  $serverName = nameCheck($parentFolder);

  //print($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');

  //Get Background Color
  preg_match('/"contentBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  $textColor = textColor($color);

  //Prep Heading
  $heading = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_heading.html');
  $heading = str_replace('Heading goes here', $birthdayRows[2][3], $heading);
  $heading = str_replace('align="left"', 'align="center"', $heading);
  $heading = marginBuilder($heading);

  preg_match('/<h1.*?style="(.*?)".*?>/', $heading, $matches, PREG_OFFSET_CAPTURE);

  $headingStyle = $matches[1][0];
  $headingStyleNew = $headingStyle . ' font-size: 24px;';
  $heading = str_replace($headingStyle, $headingStyleNew, $heading);

  //Prep Image
  $image = file_get_contents('flares/_defaults/image.html');
  $image = str_replace('http://img2.email2inbox.co.uk/editor/fullwidth.jpg', 'http://img2.email2inbox.co.uk/2016/stonegate/templates/placeholder.jpg', $image);

  //Prep Spacer
  $emptySpacer = file_get_contents('basic-spacer.html');
  $largeSpacer = str_replace('<td align="center" height="20" valign="middle"></td>', '<td align="center" height="40" valign="middle"></td>', $emptySpacer);

  //Prep All Text
  $basicText = file_get_contents('flares/_defaults/text.html');
  $textOne = $textTwo = $basicText;

  //Prep Text One
  $birthdayRows[2][4] = str_replace('"', '', $birthdayRows[2][4]);
  $textOne = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[2][4], $textOne);
  //$textOne = str_replace('"', '', $textOne);
  $textOne = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textOne);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textOne = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textOne);
  $textOne = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textOne);
  $textOne = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textOne);

  //Prep Promo Image
  $url = getURL($serverName);


  //Prep Voucher
  $voucherInstructions = $birthdayRows[1][9];

  $voucher = file_get_contents($parentFolder . '/bespoke blocks/' . $parentFolder . '_voucher.html');
  $voucherSearch = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
  $voucher = str_replace($voucherSearch, $voucherInstructions, $voucher);

  $voucher = marginBuilder($voucher);

  //Prep Text Two
  $birthdayRows[2][7] = str_replace('"', '', $birthdayRows[2][7]);
  $textTwo = str_replace('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales vehicula tellus pellentesque malesuada. Integer malesuada magna felis, id rutrum leo volutpat eget. Morbi finibus et diam in placerat. Suspendisse magna enim, pharetra at erat vel, consequat facilisis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla est velit, lobortis eu tincidunt sit amet, semper et lorem.', $birthdayRows[2][7], $textTwo);
  $textTwo = preg_replace('/##(.+?)##/m', '<p>$1</p>', $textTwo);

  $styleInsert = 'style="color: ' . $textColor . ';font-weight: bold; font-family: arial;"';

  $textTwo = str_replace('<td class="text" align="left" valign="0">', '<td class="text" align="center" valign="0" ' . $styleInsert . '>', $textTwo);
  $textTwo = str_replace('<tr>', '<tr><td align="center" width="30"></td>', $textTwo);
  $textTwo = str_replace('</tr>', '<td align="center" width="30"></td></tr>', $textTwo);

  preg_match('/"emailBackground": "(.*)"/', $template, $matches, PREG_OFFSET_CAPTURE);
  $color = $matches[1][0];
  //print($color . ' : ');
  $textColor = textColor($color);
  //print($textColor . '<br/>');

  $terms = termsBuilder($birthdayRows[2][8]);
  $styleInsert = 'style="font-size: 11px; color: ' . $textColor . '"';
  $terms = preg_replace('/<td valign="top">/', '<td valign="top" align="center" ' . $styleInsert . '>', $terms);

  // print($terms);

  $insert = $image . $largeSpacer . $heading . $emptySpacer . $textOne .  $largeSpacer . $voucher . $largeSpacer . $textTwo . $largeSpacer;

  $search = "/<!-- User Content: Main Content Start -->\s*<!-- User Content: Main Content End -->/";
  $output = preg_replace($search, "<!-- User Content: Main Content Start -->" . $insert . "<!-- User Content: Main Content End -->", $template);

  $search = "/<!-- terms insert -->/";
  $output = preg_replace($search, $terms, $output);

  $append = "birthday_6_weeks";

  sendToFile($output, $append, $serverName);

  print_r($output);
}

?>
