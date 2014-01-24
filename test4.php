<?php

require('serviceresource.php');
$obj = new ServiceResources();

$url = 'www.reddit.com';

$count = $obj->getLinkCount($url);
echo 'Link Count: ' .$count;
?>
