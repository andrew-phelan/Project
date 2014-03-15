<?php

class CheckResponse{

	public $resp;

	public function getResponseCode($url){
	// get HTTP response header
		$headers = get_headers($url, 1);
		if($headers[0] =='HTTP/1.1 200 OK' || $headers[0] == 'HTTP/1.0 200 OK'){
			$value = 1;
		}
		else{
			$value = $headers[0];
		}
		return $value;

	}

}


?>
