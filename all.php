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
          <?php include("topnav.php"); ?>
        </ul>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Listing All Profiled Pages</h1>
        <p><p><a class="btn btn-lg btn-success" href="/advertiser.php" role="button">Advertiser</a>
	&nbsp; &nbsp;
	<a class="btn btn-lg btn-success" href="/webmaster.php" role="button">Web Master</a></p></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
	<div class="col-lg-2">
	</div>
        <div class="col-lg-8">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <?php session_start();
		require('displaymongo.php'); $disp = new DisplayMongo(); 
	 	$pages = $disp->displayPages1();?>
		<hr />
		<button class="btn btn-lg btn-block btn-primary" type="submit">View Selected Page</button>
        </div>
        <div class="col-lg-2">
	</div>
      </div>
<?php
require('serviceresource.php');
require('poshelper.php');
require('valuation.php');
	

$api = new APIHelper();
$obj = new ServiceResource();
$val = new Valuation();


if(isset($_POST['page'])){
	$url =$_POST['page'];
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

			
	$nCount = $obj->count($nouns);
	$per = $nCount/$wordCount*100;
	echo "<div class=\"jumbotron\"><h1>{$url}</h1><hr /><h2>Keywords Found</h2><p class=\"lead\">"; 
	for($i = 0; $i < count($nouns); $i++){
		echo "Noun: " .$nouns[$i] ."\n";
	}
		echo "</div><hr />
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
		</table><br /></div><hr />";
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

