<?php

foreach(glob("*/*/*.html") as $filename){
	$templateIn = file_get_contents($filename);

	$topFolder = preg_replace('/(.*?)\/.*?\/.*/', '$1', $filename);
	$midFolder = preg_replace('/.*?\/(.*?)\/.*/', '$1', $filename);

	$filename = preg_replace('/.*?\/.*?\//', '', $filename);
	$filename = str_replace('.html', '', $filename);

	$fileType = '.html';

	$templateOut = fixEmailTables($templateIn);

	$outputPath = $topFolder . '/' . $midFolder . '/' . $filename . $fileType;
	print_r($outputPath . '<br/>');
	file_put_contents($outputPath, $templateOut);
}

// Fix email tables function
function fixEmailTables($template) {
	// Regex's for table fixes
	$template = preg_replace('/(<table((?!cellpadding)[^>])*)>/', '$1 cellpadding="0">', $template);
	$template = preg_replace('/(<table((?!cellspacing)[^>])*)>/', '$1 cellspacing="0">', $template);
	$template = preg_replace('/(<table((?!border)[^>])*)>/', '$1 border="0">', $template);
	$template = preg_replace('/(<td((?!valign)[^>])*)>/', '$1 valign="0">', $template);
	$html    = '';
	// Add width as a style attr
	$splitHtml = explode(PHP_EOL, $template);
	$styleTag  = '/^((?!style).)*$/m';
	// add the width attribute into the style tag if set in html
	foreach ($splitHtml as $splitLine) {
		if (preg_match($styleTag, $splitLine)) {
		    $html .= preg_replace('/(<table.+width=")(\d+)(".+)(>)/', '$1$2$3 style="width:$2px;"$4', $splitLine) . PHP_EOL;
		} else {
			$html .= preg_replace('/(<table.+width=")(\d+)(".+)(style=")(.+?")/', '$1$2$3$4width:$2px;$5', $splitLine) . PHP_EOL;
		}
	}
	return $html;
}
?>
