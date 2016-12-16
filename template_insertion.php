<?php
//function template_insertion(){
  // $dir = '/templates/*/templates/';
  $sql = null;
  foreach (glob("*/templates/*.html") as $filename) {
      $temp = file_get_contents($filename);
      //print_r($filename . "<br/>");
      $temp = preg_replace('/\{.*?\}/ms', '', $temp);
      // var_dump($temp);
      $temp = base64_encode($temp);

      $category = preg_replace('/(.*?\/.*?\/.*?)(_branded|_venue)(.html)/', '$2', $filename);
      $category = str_replace('_', ' ', $category);
      $catCaps = ucwords($category);

      //echo $catCaps . '<br/>';

      $filename = preg_replace('/.*?\/.*?/', '', $filename);
      $filename = str_replace('.html', '', $filename);
      $filename = str_replace('_', ' ', $filename);
      $name = ucwords($filename);

      // echo $category . '<br/>';
      //echo $name . '<br/>';

      $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
              ('1222', '" . $name . "', NULL, '" . $temp . "', NULL, NULL, '" . trim($catCaps) . "', NULL, '1');" . "<br/><br/>";

      //$sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
      //        ('1222', '" . $name . "', NULL, '" . $temp . "', NULL, NULL, '" . $catCaps . "', NULL, '1');" . PHP_EOL;

    //  $file = 'inserts/templates.txt';
    //  file_put_contents($file,$sql);
    }
    echo $sql . '<br/><br/>';
//}
?>
