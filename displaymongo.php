<?php

require('apihelper.php');

class DisplayMongo{

	public function displayPages(){
		//return all pages
		$obj = new APIHelper();
		$pages = $obj->viewAll();
		foreach($pages as $page){
			echo $page['url'] ." <input type=\"radio\" name=\"page\" value=\"". $page['url']."\"><br>";
		}
	}

	public function displayPages1(){
		//return all pages
		$obj = new APIHelper();
		$query = array('type' => 'web');
		$pages = $obj->viewAllByQuery($query);
		foreach($pages as $page){
			echo "<strong>" .$page['url'] ."</strong> &nbsp; <input type=\"radio\" name=\"page\" value=\"". $page['url']."\"><br>";
		}
	}
	public function displayKeys($query){
		//create an array based on queried search
		$obj = new APIHelper();
		$pages = $obj->viewAllByQuery($query);
		$arr = array();
		foreach($pages as $page){
			array_push($arr, $page['keywords']);
		}return $arr;
	}
}
?>
