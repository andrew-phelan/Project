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
     <link href="/public/css/signin.css" rel="stylesheet">

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
		<h2>Already Have an Account?</h2>
		<p><a class="btn btn-lg btn-success" href="/signin.php" role="button">Sign In</a></p>
	</div>

	<div class="container">
		<form class="form-signin" role="form" method="post" action="registration.php">
			<h2 class="form-signin-heading">Create New Account</h2>
			<input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
			<input type="text" class="form-control" name="org" placeholder="Organisation" required>
			<input type="email" class="form-control" name="email" placeholder="Email address" required>
			<input type="password" class="form-control" name="password" placeholder="Password" required>
			<input type="password" class="form-control" name="password1" placeholder="Repeat Password" required>
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		
		</form>
	</div>

     <hr />

      <!-- Site footer -->
      <div class="footer">
        <p>&copy; Ad Value 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

