<?php

class Registration{

	public $db = "test";
	public $collection = "test";

	public function addUser($db, $collection, $entry){
	// add the user to the collection
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->insert($entry);
		$closed = $conn->close();
		$out = "User Successfully Added.";
		return $out;
	}

	public function deleteUser($db, $collection, $param, $email, $param1, $password){
	// remove the user from the collection
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->remove(array($param=>$email, $param1=>$password));
		$closed = $conn->close();
		$out = "User Successfully Removed.";
		return $out;

	}

	public function login($db, $collection, $entry){
	// find the user
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->findOne(array($entry));
		if($doc != null){
			$success = 1;			
		}
		else{
			$success = 0;
		}
		return $success;

	}

	public function logout(){



	}
}
?>
