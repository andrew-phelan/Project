<?php


class API {

	private $method = '';
	private $resource = '';

	
//data structure uri, title, body, valuation

// should return all 
GET/data/

// should return a specified object
GET/data/id

// should return the value of a specified object
GET/data/id/valuation

// should delete a specified object
DELETE/data/id

//should update a specified object
PUT/data/

	public function get_res($db, $collection, $id){
		$conn = new MongoClient();
		$coll = $conn->$db->$collection;
		$doc = $coll->findOne({"ident":$id});
		echo json_encode($doc);
	}

}

?>
