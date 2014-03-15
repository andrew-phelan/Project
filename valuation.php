<?php


class Valuation {

	public $totalValue = 0;
	public $value = 0;

	
//calculate value of words
	public function valueWords($count){
		if($count <= 100){
			$value = 1;
		}
		elseif($count > 100 and $count <= 400){
			$value = 2;
		}
		elseif($count > 400 and $count <= 700){
			$value = 3;
		}
		elseif($count > 700 and $count <= 1200){
			$value = 4;
		}
		elseif($count > 1200 and $count <= 1800){
			$value = 5;
		}
		else{
			$value = 1;
		}
		return $value;

	}
//devalue more than one h1
	public function h1Check($count){
		if($count >= 2){
			$value = -1;
		}
		else{
			$value = 0;
		}
		return $value;

	}

//calculate value of headers
	public function valueHeaders($count){
		if($count <= 1){
			$value = 1;
		}
		elseif($count > 1 and $count <= 3){
			$value = 2;
		}
		elseif($count > 3 and $count <= 4){
			$value = 3;
		}
		elseif($count > 4 and $count <= 6){
			$value = 4;
		}
		elseif($count > 6 and $count <= 8){
			$value = 5;
		}
		else{
			$value = 1;
		}
		return $value;


	}
//calculate value of links based on googles recommendation of > 100 per page
	public function valueLinks(){
		if($count <= 5){
			$value = 1;
		}
		elseif($count > 5 and $count <= 10){
			$value = 2;
		}
		elseif($count > 10 and $count <= 30){
			$value = 3;
		}
		elseif($count > 30 and $count <= 50){
			$value = 4;
		}
		elseif($count >50 and $count <= 90){
			$value = 5;
		}
		else{
			$value = 1;
		}
		return $value;


	}
//calculate value of keywords
	public function valueKeywords($words){
		if($words >= 1 and $words <= 5){
			$value = 2;
		}
		elseif($words >= 5 and $words <= 15){
			$value = 3;
		}
		elseif($words >= 15 and $words <= 30){
			$value = 4;
		}
		elseif($words >= 30){
			$value = 5;
		}
		else{
			$value = 1;
		}
		return $value;


	}

//calculate value of images
	public function valueImages($count){
		if($count <= 6){
			$value = 2;
		}
		else{
			$value = 1;
		}
		return $value;

	}

//calculate value of words when next to images and videos...vice versa

	public function wvilValue($word, $img, $vid, $link){
		if($word <= 100 and $img || $vid !=0){
			$total = $img + $vid + $link;
			if($total <= 20){
				$value = 1;
			}
			elseif($total >= 20 and $total <= 40){
				$value = 2;
			}
			elseif($total >= 40 and $total <= 50){
				$value = 3;
			}
			elseif($total >= 50 and $total <= 60){
				$value = 4;
			}
			elseif($total >= 60 and $total <= 80){
				$value = 5;
			}else{
				$value = 1;
			}

		}
		return $value;


	}


//calculate value of videos
	public function valueVideos($count){
		if($count <= 3){
			$value = 2;
		}
		else{
			$value =1;
		}
		return $value;


	}

//calculate total value
	public function getTotal($a, $b, $c, $d){
		$totalValue = $a + $b + $c +$d;
		return $totalValue;
	

	}
}


?>
