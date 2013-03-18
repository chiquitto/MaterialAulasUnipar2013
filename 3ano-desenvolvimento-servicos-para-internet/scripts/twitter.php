<html>
  <head>
  
  </head>
  
  <body>
<?php

$url = 'C:\Arquivos de programas\Zend\Apache2\htdocs\olhardigital.xml';

$string = file_get_contents($url);

$rss = new SimpleXmlElement($string);
?>
  <h1><?php echo (string) $rss->channel->title; ?></h1>
  
<?php
foreach($rss->channel->item as $item) {
	echo (string) $item->title . '<br>';
}
?>

  </body>
</html>