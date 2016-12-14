<?php
  // $dir = '/templates/*/templates/';
  $sql = null;
  foreach (glob("pre_made/*_newsletter/*.html") as $filename) {
      $temp = file_get_contents($filename);
      //print_r($filename . "<br/>");

      //Remove comment tags
      $temp = preg_replace('/\{.*?\}/ms', '', $temp);
      $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);

      $temp = base64_encode($temp);

      $category = preg_replace('/(.*?)\/(.*?)\/(.*?).html/', '$2', $filename);
      $category = str_replace('_newsletter', ' ', $category);
      $catCaps = ucwords($category);
      //print_r($catCaps . "<br/>");

      $filename = preg_replace('/.*?\/.*?/', '', $filename);
      $filename = str_replace('.html', '', $filename);
      $filename = str_replace('_', ' ', $filename);
      $name = ucwords($filename);

      //echo $temp . '<br/>';
      //echo $name . '<br/>';

      $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
              ('1222', '" . $name . "', NULL, '" . $temp . "', NULL, NULL, '" . $catCaps . "', NULL, '1');" . '<br/><br/>';

      //$file = 'compiled/blocks/'.$lowerName.'.txt';
    //  file_put_contents($file,$sql);



    }
    echo $sql . "<br/>";
    //
    // $outputPath = "inserts/";
    // $append = "belly_band";
    // $fileType=".txt";
    //file_put_contents(($outputPath . $append . $fileType), $sql);
?>
