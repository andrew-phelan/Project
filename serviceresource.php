
<?php
require('simple_html_dom.php');
//require('checkresponse.php');
?>
<?php
class ServiceResource {

	public $url = "www.example.com";
	public $hNumber = 'h1';

//****Should This be performed  before invoked these functions?? ***//
	//public function getResponse(){
	//	$obj = new CheckResponse();
	//	$res = $obj->getResponseCode();
	//	return $res;
	//}
//****Grab Details Functions	
	public function getLinks($url){
	// get the actual links on the page as text
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('a') as $element)
       		echo $element->href . '<br />';
	}

	public function getImgs($url){
	// get all image sources
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('img') as $element)
		echo $element->src . '<br />';
	}

	public function getHeaders($url, $hTag){
		// get the actual header text
		$resp = file_get_html('http://' .$url);
		foreach($resp->find($hTag) as $element)
		echo '<p>Header Type: '.$hTag .' Header Text: ' .$element->plaintext .'</p>';
	}

	public function getWords($url){
	//get all text 
		$resp = file_get_html('http://' .$url)->plaintext;
		//if($resp != null){
		//$words = array();
		//$words = array_push(split(" ", $words), $resp);
			//foreach($words as $element){
		//		echo $words;
			//}
		//}
		//else{
		//	break;
		//}
		return $resp;

	}
//** Make meta words ...under construction
	public function removeIgnored($url){
	// remove junk words
	$words = $this->getWords($url);
	$start = array();
	$start = array();
	foreach($word as $element)
		if(in_array($element, $start)){
			$finish = array_pop($start);
		}else{
			echo "Something went wrong!!";
		}
		return $finish;
	}
	
	public function getKeywords($url){
	// get all of the keywords
		$resp = $this->getWords($url);
		$afterIgnored = $this->removeIgnored($resp);
		return $afterIgnored;
		
	}


	public function createMetaKeywords(){
	// create new keyword index
		$match = array();
		$key = $this->getKeywords();

	}

//*** Count Functions

	public function getHeaderCount($url, $hNumber){
	// count the number of Headers
		$count = 0;
		$resp = file_get_html('http://' .$url);
		foreach($resp->find($hNumber) as $element){
			$count +=1;
		}
			return $count;
	}

	public function getWordCount($url){
		// return the total number of words found on url
		$count = 0;
		$resp = file_get_html('http://' .$url)->plaintext;
		$count = str_word_count($resp);
		return $count;
	}

	public function getImgCount($url){
	//get img count
		$count = 0;
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('img') as $element){
			$count +=1;
		}
			return $count;
	}
	
	public function getParagraphCount($url){
	// return the count of paragraphs on the page
		$count = 0;
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('p') as $element){
			$count +=1;
		}
			return $count;
	}

	public function getLinkCount($url){
	// return the count of links on the page
		$count = 0;
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('a') as $element){
			$count +=1;
		}
			return $count;
	}
}

?>
