<?php

include_once('simple_html_dom.php');

$html = file_get_html('http://www.verticalmeasures.com/resources/seo-tutorial-videos/using-h1-tag-improves-search-engine-ranking/');

// Find all images
foreach($html->find('h3') as $element)
       echo $element->plaintext . '<br />';

echo '<br />';

// Find all links
foreach($html->find('a') as $element)
       echo $element->href . '<br>'; 

?>
