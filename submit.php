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
		<h2 class="form-signin-heading">Profile Web Page</h2>
		<input type="text" class="form-control" name="url" placeholder="www.example.com" required autofocus>
		<hr />
		<button class="btn btn-lg btn-block btn-primary" type="submit">Submit Single Web Page</button>
	</form>
		<hr />
	 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2 class="form-signin-heading">Profile Multiple Web Page</h2>
		<input type="text" class="form-control" name="url1" placeholder="www.example.com" required autofocus>
		<input type="text" class="form-control" name="url2" placeholder="www.example.com" >
		<input type="text" class="form-control" name="url3" placeholder="www.example.com" >
		<hr />
		<button class="btn btn-lg btn-block btn-primary"  type="submit">Submit Multiple Web Pages</button>
	</form>
	


<?php
$saved = false;

session_start();
$_SESSION['url'] = null;
$_SESSION['url1'] = null;
$_SESSION['url2'] = null;
$_SESSION['url3'] = null;

if(isset($_POST['url'])){$_SESSION['url'] = $_POST['url'];}
if(isset($_POST['url1'])){$_SESSION['url1'] = $_POST['url1'];}
if(isset($_POST['url2'])){$_SESSION['url2'] = $_POST['url2'];}
if(isset($_POST['url3'])){$_SESSION['url3'] = $_POST['url3'];}



if(isset($_POST['url'])){$saved = true;}
if(isset($_POST['url1'])){$saved = true;}
if(isset($_POST['url2'])){$saved = true;}
if(isset($_POST['url3'])){$saved = true;}

if($saved === true){
	echo '<br /><a class="btn btn-lg btn-success" href="/review.php" role="button">Review Page Profile</a>';
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

