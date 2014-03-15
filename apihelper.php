<?php

class APIHelper {
	
	protected $doc;

	//function __construct($doc){
	//	$this->doc = $doc;
	//}

	function viewDoc($db, $collection,$param, $param1){
		// make a call to the php class that returns the mongodb json
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->findOne(array($param=>$param1));
		
		//foreach ($doc as $document) {
    			echo $document .'<br />';
		//	}
		$closed = $conn->close();
	}

	function viewAll($db, $collection){
		// make a call to the php class that returns the mongodb json
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->find();
		foreach ($doc as $document) {
    			print_r($document);
			}
		$closed = $conn->close();
	}

	function addDoc($db, $collection, $entry){
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->insert($entry);
		$closed = $conn->close();
	}
	function count($db, $collection, $param, $param1){
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->count(array($param=>$param1));
		$closed = $conn->close();
	}
	//function deleteDoc(){

	//}

}
?>
