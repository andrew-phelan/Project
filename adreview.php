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

	<div class="col-lg-3">
			&nbsp;
	</div>

     <div class="row">
        <div class="col-lg-6">
		<hr />
	
<?php
session_start();
require('apihelper.php');
require('valuation.php');
$api = new APIHelper();
$val = new Valuation();

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

$query = array('type' => 'web');
$doc = $api->viewAllByQuery($query);
echo "<table class=\"table table-striped\"><tr><th>Web Page</th><th>Relevance Score</th></tr>";
foreach($doc as $d){
	$score = $val->coefficient($d['nouns'],$keys);
	echo "<tr><td>" .$d['url'] ."</td><td><strong>" .$score ."</strong></td></tr>";
}
echo "</table>";	
?>

 	</div>

        <div class="col-lg-3">
       </div>
      </div>
      </div>
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
