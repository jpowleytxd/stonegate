<?php
  include 'branded_belly_band.php';
  include 'branded_newsletter.php';
  include 'branded_adhoc.php';

  include 'venue_belly_band.php';
  include 'venue_newsletter.php';
  include 'venue_adhoc.php';

  include 'belly_band_insertion.php';
  include 'newsletter_insertion.php';
  include 'adhoc_insertion.php';

  include 'template_insertion.php';
  include 'block_insertion.php';

  branded_belly_band();
  branded_newsletter();
  branded_adhoc();
  
  venue_belly_band();
  venue_newsletter();
  venue_adhoc();

  belly_band_insertion();
  newsletter_insertion();
  adhoc_insertion();

  template_insertion();
  block_insertion();

 ?>
