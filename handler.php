<?php
//this script will handle all POST from evaluate page and call valuation.php
require('serviceresource.php');
require('apihelper.php');
require('checkresponse.php');
//$url = $_POST["url"];
$url = "localhost/index.html";
$conn = new APIHelper();
$obj = new ServiceResource();
$resp = new CheckResponse();

$found = $resp->getResponseCode("http://".$url);
if($found == 1){
echo "response: " .$found;
$links = $obj->getLinks($url);
$linkCount = $obj->getLinkCount($url);
$wordCount = $obj->getWordCount($url);
$imgs = $obj->getImgs($url);
$imgCount = $obj->getImgCount($url);

$h1 = $obj->getHeaders($url, "h1");
$h2 = $obj->getHeaders($url, "h2");
$h3 = $obj->getHeaders($url, "h3");
$h4 = $obj->getHeaders($url, "h4");
$h5 = $obj->getHeaders($url, "h5");
$h6 = $obj->getHeaders($url, "h6");


$h1 = $obj->getHeaderCount($url, "h1");
$h2 = $obj->getHeaderCount($url, "h2");
$h3 = $obj->getHeaderCount($url, "h3");
$h4 = $obj->getHeaderCount($url, "h4");
$h5 = $obj->getHeaderCount($url, "h5");
$h6 = $obj->getHeaderCount($url, "h6");

if($h1 == null){
	$h1 = 0;
}
if($h2 == null){
	$h2 = 0;
}
if($h3 == null){
	$h3 = 0;
}
if($h4 == null){
	$h4 = 0;
}
if($h5 == null){
	$h5 = 0;
}
if($h6 == null){
	$h6 = 0;
}

$db = "test";
$coll = "test";
//$entry = array("Name"=>$url, "Links"=>$links, "LinkCount"=>$linkCount, "Word Count"=>$wordCount, "Images"=>$imgs);
//$add = $conn->addDoc($db, $coll, $entry);
$words = $obj->getWords($url);
echo $words;

echo "Url: " .$url ."<br />";
echo "Link Count: " .$linkCount ."</br>";
echo "Word Count: " .$wordCount ."</br>";
echo "Images: " .$imgs ."</br>";
echo "Image Count: " .$imgCount ."</br>";
echo "H1: " .$h1 ."</br>";
echo "H2: " .$h2 ."</br>";
echo "H3: " .$h3 ."</br>";
echo "H4: " .$h4 ."</br>";
echo "H5: " .$h5 ."</br>";
echo "H6: " .$h6 ."</br>";
}else {
	echo $found ."Unable to access page.";
}
?>
