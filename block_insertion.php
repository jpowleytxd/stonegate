<?php
  // $dir = '/templates/*/templates/';
  $sql = null;
  foreach (glob("*/bespoke blocks/*.html") as $filename) {
      $temp = file_get_contents($filename);
      //print($filename . '</br>');

      $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);

      $temp = base64_encode($temp);

      $folder = preg_replace('/(.*?)\/.*?\/.*/', '$1', $filename);
      $folder = str_replace('_', ' ', $folder);
      $folder = ucwords($folder);
      // echo $filename . '<br/>';
      //echo $folder . '<br/>';

      $filename = preg_replace('/.*?\/.*?\//', '', $filename);
      $filename = str_replace('.html', '', $filename);
      $lowerName = $filename;
      $filename = str_replace('_', ' ', $filename);

      $upperName = ucwords($filename);

      //echo $temp . '<br/>';
      //echo $upperName . '<br/>';

      $sql .= "INSERT INTO `tbl_template_editor_blocks` (`block_name`, `block_account_id`, `block_type_id`, `block_type`, `block_html`, `block_category`) VALUES
              ('" . $upperName . "', '1222', 'stonegate_" . $lowerName . "', 'bespoke', '" . $temp . "', '" . $folder . "');"  . "<br/><br/>";

      //$file = 'compiled/blocks/' . $lowerName . '.txt';
      //file_put_contents($file, $sql);



    }
    echo $sql . "<br/>";

  //  $outputPath = "inserts/";
  //  $append = "bespoke_blocks";
  //  $fileType=".txt";
    //file_put_contents(($outputPath . $append . $fileType), $sql);
?>
