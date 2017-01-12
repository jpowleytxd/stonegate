<?php
function getURL($name){
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
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <style>
		body {
			padding: 100px 20px;
			background: #434343;
			min-width: 600px;
			color: #fff;
			font-family: Arial, sans-serif;
		}
		.site-header {
			background: #545454;
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			height: 80px;
			min-width: 600px
		}
		.site-header .fr {
			float: right;
			line-height: 80px;
			margin-right: 30px;
			color: #fff;
			font-size: 13px;
			letter-spacing: 3px;
		}
		h1 {
			display: block;
			margin-top: 50px;
			color: #b4ae98;
		}
		h1:first-of-type {
			margin-top: 30px;
		}
		a {
			display: block;
			padding: 20px 10px;
			color: #fff;
			text-decoration: none;
			border-bottom: 1px solid #b4ae98;
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		a::after {
			content: 'View email';
			display: none;
			color: #b4ae98;
			float: right;
		}
		a:hover {
			background: #545454;
		}
		a:hover::after {
			display: block;
		}
	</style>
</head>
<body>
	<div class="site-header">
		<img class="logo" src="http://img2.email2inbox.co.uk/2016/stonegate/templates/sg_logo.jpg"></img>
		<span class="fr">CRM EMAIL TEMPLATES</span>
	</div>



<?php

foreach(glob("*/templates/*_branded.html") as $filename){
  $template = file_get_contents($filename);
  $parentFolder = preg_replace('/(.*?)\/.*/', '$1', $filename);
  $parentFolder = getURL($parentFolder);
  $title = preg_replace('/\_/', ' ', $parentFolder);
  $title = ucwords($title);
  print_r('<h1>' . $title . '</h1>');
  print_r('<a href="compiled/' . $parentFolder . '/birthday_1_week.html">Birthday -1  Week</a>');
  print_r('<a href="compiled/' . $parentFolder . '/birthday_3_weeks.html">Birthday -3  Week</a>');
  print_r('<a href="compiled/' . $parentFolder . '/birthday_6_weeks.html">Birthday -6  Week</a>');

  print_r('<a href="compiled/' . $parentFolder . '/wifi_1_day.html">WIFI Sign In 1 + 1 Day</a>');
  print_r('<a href="compiled/' . $parentFolder . '/wifi_7_days.html">WIFI Sign In 1 + 7 Days</a>');
  print_r('<a href="compiled/' . $parentFolder . '/wifi_21_days.html">WIFI Sign In 1 + 21 Days</a>');
}

 ?>

</body>

</html>
