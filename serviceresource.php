
<?php
class ServiceResources {



	public $url = "www.example.com";
	public $count = 0;


	public function getLinks(){
	require('simple_html_dom.php');
	// get the actual links on the page as text
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('a') as $element)
       		echo $element->href . '<br>';

	}

	public function getLinkCount($url){
	// return the count of links on the page
	require('simple_html_dom.php');
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('a') as $element){
			$count = $count +1;
		}
			return $count;

	}


	public function getWordCount($url){
		// return the total number of words found on url
		$resp = file_get_html('http://' .$url)->plaintext; 

		$count = str_word_count($resp);
		return $count;
		//echo "Total Count: " .$count;

	}

	
	public function getHeaders(){


	}

	
	public function getKeywords(){

	
	}


	public function createMetaKeywords(){


	}


}

?>
