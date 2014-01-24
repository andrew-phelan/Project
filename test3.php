<?php

require('simple_html_dom.php');
$count = 0;
$resp = file_get_html('http://www.youtube.com/watch?v=KleUddM2IPw')->plaintext; 

$count = str_word_count($resp);

echo "Total Count: " .$count;

//$arr =  explode(" ", $resp);

//foreach($arr as $ar){
//	$count = $count + 1;
	
//}
//echo "Total Count: " .$count;

//$url = "http://www.reddit.com";
//$resp = file_get_contents($url);

//var_dump($resp);
//$xml = simplexml_load_string($resp);

//print_r($xml);

//$newXml = new SimpleXmlElement($resp);
//$elem = "" . $newXml->body;
//echo $elem;
?>
