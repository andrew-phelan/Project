<?php

class APIHelper {

	function viewDoc($param){
		// make a call to the php class that returns the mongodb json
		$coll = "";
		$dBase = "";
		$username = "";
		$password = "";
		$host = "";
		$port = "";

		$conn = new MongoClient("mongodb://${username}:${password}@{$host}:{$port}");
		$db = $conn->$dBase;	
		$collection = $conn->$db->$coll;
		$doc = $collection->findOne(array("_id" => $param));
    		return $doc;
		$closed = $conn->close();
	}

	function viewAll(){
		// make a call to the php class that returns the mongodb json
		$coll = "";
		$dBase = "";
		$username = "";
		$password = "";
		$host = "";
		$port = "";

		$conn = new MongoClient("mongodb://${username}:${password}@{$host}:{$port}");
		$db = $conn->$dBase;
		$collection = $conn->$db->$coll;

		$cursor = $collection->find();
		$arr = array();
		while ($cursor->hasNext())
		{
    		array_push($arr, $cursor->getNext());
		}return $arr;
		$closed = $conn->close();
	}
	
	function viewAllByQuery($query){
		// make a call to the php class that returns the mongodb json
		$coll = "";
		$dBase = "";
		$username = "";
		$password = "";
		$host = "";
		$port = "";

		$conn = new MongoClient("mongodb://${username}:${password}@{$host}:{$port}");
		$db = $conn->$dBase;
		$collection = $conn->$db->$coll;

		$cursor = $collection->find($query);
		$arr = array();
		while ($cursor->hasNext())
		{
    		array_push($arr, $cursor->getNext());
		}return $arr;
		$closed = $conn->close();
	}

	function addDoc($entry){
		$coll = "";
		$dBase = "";
		$username = "";
		$password = "";
		$host = "";
		$port = "";

		$conn = new MongoClient("mongodb://${username}:${password}@{$host}:{$port}");
		$db = $conn->$dBase;
		$collection = $conn->$db->$coll;
		$doc = $collection->insert($entry);
		$closed = $conn->close();
	}
	function count($db, $collection, $param, $param1){
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->count(array($param=>$param1));
		$closed = $conn->close();
	}
}
?>
