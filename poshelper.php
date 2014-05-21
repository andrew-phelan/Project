<?php
require('posttagger.php');
// little helper function to print the results

function printTag($tags) {
	$arr = array();
        foreach($tags as $t) {
		if($t['tag'] === 'NN' || $t['tag'] === 'NNP' || $t['tag'] === 'NNS' ){
                	array_push($arr, $t['token']);
		}
        }
	return $arr;
}
?>
