
<?php
require('simple_html_dom.php');
?>
<?php
class ServiceResource {

	public $url = "www.example.com";
	public $hNumber = 'h1';


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
		$words = strtolower($resp);
		return $words;

	}	
	public function getKeywordsCount($urls, $keywords){
		foreach($urls as $url){
			$words = $this->getKeywords($url, $keywords);
			foreach($words as $word){
				//echo $word ."<br />";
				//echo "<h2>Url: " .$url ."</h2>"  ."<h2>Total: " .count($words) ."</h2><br />";		
			}
			echo "<h2>Url: " .$url ."</h2>"  ."<h2>Total: " .count($words) ."</h2><br />";
		}
	}
	
	public function getKeywords($url, $keywords){
	// check if webpage array results matches $keywords
			$links = $this->getWords($url);
			$lower = strtolower($links);
			$words = preg_split("/[\s,]+/", strtolower($links));
			$result = array_intersect($words, $keywords);
			return $result;
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

	public function getCommentCount($url){
	// return the count of comments on the page
		$count = 0;
		$resp = file_get_html('http://' .$url);
		foreach($resp->find('comment') as $element){
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
	public function count($var){
		$start = 0;
		foreach($var as $v){
			$start+=1;
		}
		return $start;
	}
}

?>
