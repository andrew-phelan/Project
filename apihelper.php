<?php

class APIHelper {
	
	private $doc;

	function __construct($doc){
		$this->doc = $doc;
	}

	function viewDoc(){
		// make a call to the php class that returns the mongodb json
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->find();
		echo json_decode($doc);
	}

	function addDoc($db, $collection, $entry){
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->insert($entry);
	}

	//function deleteDoc(){

	//}

}
?>
