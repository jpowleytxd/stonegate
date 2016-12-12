<?php
  // $dir = '/templates/*/templates/';
  $sql = null;
  foreach (glob("*/templates/*.html") as $filename) {
      $temp = file_get_contents($filename);
      //print_r($filename . "<br/>");
      $temp = preg_replace('/\{.*?\}/ms', '', $temp);
      // var_dump($temp);
      $temp = base64_encode($temp);


      $filename = preg_replace('/.*?\/.*?/', '', $filename);
      $filename = str_replace('.html', '', $filename);
      $filename = str_replace('_', ' ', $filename);
      $name = ucwords($filename);

      //echo $temp . '<br/>';
      //echo $name . '<br/>';

      $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
              ('1222', '" . $name . "', NULL, '" . $temp . "', NULL, NULL, 'one', NULL, '1');" . '<br/><br/>';

      //$file = 'compiled/templates/'.$name.'.txt';
      //file_put_contents($file,$sql);
    }
    echo $sql . '<br/><br/>';
?>
