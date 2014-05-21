<?php

class CheckResponse{

	public function getResponseCode($url){
	// get HTTP response header
		$headers = get_headers("http://{$url}", 1);

		if($headers[0] =='HTTP/1.1 200 OK' 
		|| $headers[0] == 'HTTP/1.0 200 OK' 
		|| $headers[0] == 'HTTP/1.0 303 See Other' 
		|| $headers[0] == 'HTTP/1.1 303 See Other' 
		|| $headers[0] == 'HTTP/1.0 301 Moved Permanently' 
		|| $headers[0] == 'HTTP/1.1 301 Moved Permanently' 
		|| $headers[0] == 'HTTP/1.0 302 Moved Temporarily' 
		|| $headers[0] == 'HTTP/1.1 302 Moved Temporarily'){
			$value = 1;
		}
		elseif($headers[0] === Null){
			$headers = get_headers("https://{$url}", 1);

			if($headers[0] == 'HTTP/1.1 200 OK' 
			|| $headers[0] == 'HTTP/1.0 200 OK' 
			|| $headers[0] == 'HTTP/1.0 303 See Other' 
			|| $headers[0] == 'HTTP/1.1 303 See Other' 
			|| $headers[0] == 'HTTP/1.0 301 Moved Permanently' 
			|| $headers[0] == 'HTTP/1.1 301 Moved Permanently' 
			|| $headers[0] == 'HTTP/1.0 302 Moved Temporarily' 
			|| $headers[0] == 'HTTP/1.1 302 Moved Temporarily'){
				$value = 1;
			}else{
				$value = 0;
			}
		}
		else{
			$value = 0;
		}
		return $value;
	}
}
?>
