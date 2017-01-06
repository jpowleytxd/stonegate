<?php

$file = fopen("iteration1contents.csv","r");
var_dump(fgetcsv($file));
fclose($file);
?>
