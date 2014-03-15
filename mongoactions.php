<?php

class MongoActions{
	
	public $connection;
	public $db;
	//public $dbName;
	//public $collName;
	public $doc = array();
	public $record;

	public function makeConnection(){
		// create a simple localhost connection
		$connection = new MongoClient();
	}
	
	public function getDatabase($dbName){
		// retrieve a specified db from localhost
		$connection = $this->makeConnection();
		$db = $connection->$dbName;
	}

	public function getCollection($dbName, $collName){
		// retrieve a specified collection
		$db = $this->getDatabase($dbName);
		$collection = $db->$collName;
	}

	public function insertOne($dbName, $collName, $doc){
		// insert a single doc into the specified collection, db
		$coll = $this->getCollection($dbName, $collName);
		$coll->insert($doc);
	}

	public function one($dbName, $collName){
		// find a single entry in the specified db, collection, **findOne needs to be rethought to accept params.
		$connection = new MongoClient();
		$db = $connection->$dbName->$collName;	
		$record = $db->findOne();
	}


}
?>
