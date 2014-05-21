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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2 class="form-signin-heading">Create Your Advertisement</h2>
		<p>After you have submitted the data, simply click the button beneath the form.</p>
		<p>Select Your Target Market</p>
		<select name="market" class="form-control" required autofocus>
    			<option value="art">Arts</option>
    			<option value="business">Business Services</option>
			<option value="finance">Finance</option>
    			<option value="gaming">Gaming</option>
    			<option value="shoes">Shoes</option>
		</select>
		<p>Enter 10 Noun-Keywords for your Product</p>
		<input type="text" class="form-control" name="noun" placeholder="Enter a related noun: Age" required>
		<input type="text" class="form-control" name="noun1" placeholder="Enter a related noun: Bank" required>
		<input type="text" class="form-control" name="noun2" placeholder="Enter a related noun: Car" required>
		<input type="text" class="form-control" name="noun3" placeholder="Enter a related noun: Deal" required>
		<input type="text" class="form-control" name="noun4" placeholder="Enter a related noun: Earth" required>
		<input type="text" class="form-control" name="noun5" placeholder="Enter a related noun: Apple" required>
		<input type="text" class="form-control" name="noun6" placeholder="Enter a related noun: Box" required>
		<input type="text" class="form-control" name="noun7" placeholder="Enter a related noun: Card" required>
		<input type="text" class="form-control" name="noun8" placeholder="Enter a related noun: Duck" required>
		<input type="text" class="form-control" name="noun9" placeholder="Enter a related noun: East" required>
		<p>Input the URL of the webpage you which to check:</p>
		<input type="text" class="form-control" name="url" placeholder="www.example.com" required>
		<hr />
		<button class="btn btn-lg btn-block btn-primary" type="submit">Submit Url</button>
	</form>
		<hr />
	
<?php
$saved = false;
require('apihelper.php');
$api = new APIHelper();
session_start();
$_SESSION['url'] = null;
$_SESSION['noun'] = null;
$_SESSION['noun1'] = null;
$_SESSION['noun2'] = null;
$_SESSION['noun3'] = null;
$_SESSION['noun4'] = null;
$_SESSION['noun5'] = null;
$_SESSION['noun6'] = null;
$_SESSION['noun7'] = null;
$_SESSION['noun8'] = null;
$_SESSION['noun9'] = null;
$_SESSION['market'] = null;

if(isset($_POST['url'])){$_SESSION['url'] = $_POST['url'];}
if(isset($_POST['noun'])){$_SESSION['noun'] = $_POST['noun'];}
if(isset($_POST['noun1'])){$_SESSION['noun1'] = $_POST['noun1'];}
if(isset($_POST['noun2'])){$_SESSION['noun2'] = $_POST['noun2'];}
if(isset($_POST['noun3'])){$_SESSION['noun3'] = $_POST['noun3'];}
if(isset($_POST['noun4'])){$_SESSION['noun4'] = $_POST['noun4'];}
if(isset($_POST['noun5'])){$_SESSION['noun5'] = $_POST['noun5'];}
if(isset($_POST['noun6'])){$_SESSION['noun6'] = $_POST['noun6'];}
if(isset($_POST['noun7'])){$_SESSION['noun7'] = $_POST['noun7'];}
if(isset($_POST['noun8'])){$_SESSION['noun8'] = $_POST['noun8'];}
if(isset($_POST['noun9'])){$_SESSION['noun9'] = $_POST['noun9'];}
if(isset($_POST['market'])){$_SESSION['market'] = $_POST['market'];}

if(isset($_POST['noun'])){$saved = true;}

if($saved === true){
	echo '<br /><a class="btn btn-lg btn-success" href="/urlreview.php" role="button">Review Webpage Relevance</a>';
	$arr= array();
	array_push($arr, $_SESSION['noun']);
	array_push($arr, $_SESSION['noun1']);
	array_push($arr, $_SESSION['noun2']);
	array_push($arr, $_SESSION['noun3']);
	array_push($arr, $_SESSION['noun4']);
	array_push($arr, $_SESSION['noun5']);
	array_push($arr, $_SESSION['noun6']);
	array_push($arr, $_SESSION['noun7']);
	array_push($arr, $_SESSION['noun8']);
	array_push($arr, $_SESSION['noun9']);
	
	$market = $_POST['market'];
	foreach($arr as $a){
		$array = array("market" => $market,"keywords"=> $a);
		$api->addDoc($array);
	}
}	
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
