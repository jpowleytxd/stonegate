<?php

foreach(glob("pre_made/*/*.html") as $filename){
  $temp = file_get_contents($filename);
  print_r($temp);
}
?>
