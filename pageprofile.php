<?php

class PageProfile {

	protected $url;
	protected $nouns;
	protected $tNouns;
	protected $tWords;
	protected $tH1;
	protected $tLinks;

	public function __construct(){
		
	}

	public function setUrl($value){
		$this->url = $value;
	}
	public function setNouns($value){
		$this->nouns = $value;
	}
	public function setTotalNouns($value){
		$this->tNouns = $value;
	}
	public function setWords($value){
		$this->tWords = $value;
	}
	public function setH1($value){
		$this->tH1 = $value;
	}
	public function setLInks($value){
		$this->tLinks = $value;
	}

	public function updatePage(){
		require_once('apihelper.php');
		$ap = new APIHelper();
		$entry = array("url" => $this->url, "nouns"=>$this->nouns, "noun count"=>$this->tNouns, "word count"=>$this->tWords, "h1 count"=>$this->tH1, "link count"=>$this->tLinks);
		$ap->addDoc($entry);
	}


	public function getUrl(){
		return $this->url;
	}
	public function getNouns(){
		foreach($this->nouns as $noun){
		$arr = array();
		array_push($arr, $noun);
		
		}return $arr;
	}
	public function getTotalNouns(){
		return $this->tNouns;
	}
	public function getWords(){
		return $this->tWords;
	}
	public function getH1(){
		return $this->tH1;
	}
	public function getLinks(){
		return $this->tLinks;
	}
}
?>
