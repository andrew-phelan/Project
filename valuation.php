<?php
class Valuation {

	public function coefficient($nouns, $keywords){
		// get the total number of nouns
		$total = count($nouns);
		// get matched nouns against the stored keywords
		$matched = $result = array_intersect($nouns, $keywords);
		$same = count($matched);
		if($total === $same){
			$value = $same;
		}else{
			$value = $same - $total;
		}
		return $value;
	}
}
?>
