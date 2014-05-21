<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/public/favicon.ico">

    <title>Ad Value -Increase Your Advertising Potential</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/justified-nav.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <ul class="nav nav-justified">
          <?php 
		include("topnav.php");?>
        </ul>
      </div>

     
	<?php session_start();
	require('apihelper.php');
	require('serviceresource.php');
	require('poshelper.php');
	require('checkresponse.php');
	require('valuation.php');
	

	$api = new APIHelper();
	$obj = new ServiceResource(); 
	$resp = new CheckResponse();
	$val = new Valuation();
		

	$urls = array();
	if($_SESSION['url'] !== null){array_push($urls, $_SESSION['url']);}
	if($_SESSION['market'] !== null){$market = $_SESSION['market'];}
	

	foreach($urls as $url){
		$found = $resp->getResponseCode($url);
		if($found == 1){

			$wordCount = $obj->getWordCount($url);
			$iCount = $obj->getImgCount($url);
			$lCount = $obj->getLinkCount($url);
			$pCount = $obj->getParagraphCount($url);
			$cCount = $obj->getCommentCount($url);

			$hCount = $obj->getHeaderCount($url, "h1");
			$hCount1 = $obj->getHeaderCount($url, "h2");
			$hCount2 = $obj->getHeaderCount($url, "h3");
			$hCount3 = $obj->getHeaderCount($url, "h4");
			$hTotal = $hCount+$hCount1+$hCount2+$hCount3;

			$words = $obj->getWords($url);
			$tagger = new PosTagger('lexicon.txt');
			$tags = $tagger->tag($words);
			$nouns = printTag($tags);
			
			$keys = array();
			array_push($keys, $_SESSION['noun']);
			array_push($keys, $_SESSION['noun1']);
			array_push($keys, $_SESSION['noun2']);
			array_push($keys, $_SESSION['noun3']);
			array_push($keys, $_SESSION['noun4']);
			array_push($keys, $_SESSION['noun5']);
			array_push($keys, $_SESSION['noun6']);
			array_push($keys, $_SESSION['noun7']);
			array_push($keys, $_SESSION['noun8']);
			array_push($keys, $_SESSION['noun9']);
			$seg1 = $val->coefficient($nouns, $keys);

			
			$nCount = $obj->count($nouns);
			$per = $nCount/$wordCount*100;
			$mar = strtoupper($market);
			echo "<div class=\"jumbotron\"><h1>{$url}</h1><hr /><h2>Keywords Found</h2><p class=\"lead\">"; 
			for($i = 0; $i < count($nouns); $i++){
				echo "Noun: " .$nouns[$i] ."\n";
			}
			echo "</div><hr />
			<div class\"row\">
			<div class=\"col-lg-3\">
			&nbsp;
			</div>
			<div class=\"col-lg-6\">
			<h2>Keyword Relevance of Page</h2>
			<table class=\"table table-hover\">
			<tr><th>Market Segment</th><th>Relevance Score</th></tr>
			<tr><td>{$mar} Market</td><td>{$seg1}</td></tr>
			</table>
			</div>
			<div class=\"col-lg-3\">
			&nbsp;
			</div>
			</div>

			<div class=\"row\">
			<div class=\"col-lg-4\"><h3>Content Basics</h3>
			<table class=\"table table-striped\">
			<tr><th>Resource</th><th>Total Found</th></tr>
			<tr><td>Words</td><td>{$wordCount}</td></tr>
			<tr><td>Nouns</td><td>{$nCount}</td></tr>
			<tr><td>Noun Percentage</td><td>{$per}&#37;</td></tr>
			</table></div>
			
			<div class=\"col-lg-4\"><h3>Links and Images</h3>
			<table class=\"table table-striped\">
			<tr><th>Resource</th><th>Total Found</th></tr>
			<tr><td>Link</td><td>{$lCount}</td></tr>
			<tr><td>Image</td><td>{$iCount}</td></tr>
			<tr><td>Paragraphs</td><td>{$pCount}</td></tr>
			<tr><td>Comments</td><td>{$cCount}</td></tr>
			</table></div>

			<div class=\"col-lg-4\"><h3>Header Details</h3>
			<table class=\"table table-striped\">
			<tr><th>Header Type</th><th>Header Count</th></tr>
			<tr><td>H1</td><td>{$hCount}</td></tr>
			<tr><td>H2</td><td>{$hCount1}</td></tr>
			<tr><td>H3</td><td>{$hCount2}</td></tr>
			<tr><td>H4</td><td>{$hCount3}</td></tr>
			<tr><td>Total</td><td>{$hTotal}</td></tr>
			</table></div>";
		}else{
			$headers = get_headers("http://{$url}", 1);
			echo "<h2>There was an error with the submitted URL: ".$url ."The URL returned: " .$headers[0] ."</h2>";
		}
	}

?>
	


      <!-- Site footer -->
      <div class="footer">
        <?php include('footer.php');?>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

