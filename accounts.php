<?php
require('registration.php');
?>
<?php
class Accounts{

	//private $obj = new APIHelper;
	public $name = "";
	public $password = "";
	public $email = "";
	protected $coll = "";
	protected $db = "";

	public function addUser($name, $password, $email){
		// add new basic member
		$obj = new Registration();
		$db = "users";
		$coll = "users";
		$entry = array("name"=>$name, "password"=>$password, "email"=>$email);
		$newUser = $obj->addUser($db, $coll, $entry);
		
	}

	public function logUser($email, $password){
	// log in a registered user
		$obj = new Registration();
		$db = "users";
		$coll = "users";
		$cred = array("email"=>$email, "password"=>$password);
		$valid = $obj->findOne()

	}

	public function deleteUser($email, $password,){
	// delete a registered user
		$obj = new Registration();
		$db = "users";
		$coll = "users";
		$param = "email";
		$param1 = "password";
		$obj->deleteUser($db, $coll, $param, $email, $param1, $password)


	}

	public function validateAccount(){
	// validate the user format details and the email account. check for duplicates.

	
	}

}
?>
