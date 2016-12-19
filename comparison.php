<?PHP

foreach(glob("*/templates/*.html") as $filename){
  $template = file_get_contents($filename);

  $styles = preg_replace('/(.*(\{.*?\}).*)/ms', '$2', $template);

  $encoded = base64_encode($styles);

  $data = 'data-styles="' . $encoded . '"';

  $template = preg_replace('/(data-styles=".*?")/ms', $data, $template);
  print_r($template . '<br/>');
}

?>
