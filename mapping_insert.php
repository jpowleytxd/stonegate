<?php

$mapping = '[{"id":"dynamic1","val":"brand_name"},{"id":"dynamic2","val":"fav_venue_name"},{"id":"dynamic3","val":"fav_venue_code"},{"id":"dynamic4","val":"valid_from"},{"id":"dynamic5","val":"valid_to"},{"id":"dynamic6","val":"content_type"},{"id":"dynamic7","val":"brand_type"},{"id":"dynamic9","val":"new_password"}]';

$encoded = base64_encode($mapping);
var_dump($encoded);

foreach(glob("*/templates/*.html") as $filename){
  $template = file_get_contents($filename);
  //var_dump($mapping);

  $template = preg_replace('/(data-mappings=").*?(")/', 'data-mappings="' . $encoded . '"', $template);

  var_dump($template);

  file_put_contents($filename, $template);
}

?>
