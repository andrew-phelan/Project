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

<?php
function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}
?>

      <!-- Jumbotron -->
      <div class="jumbotron">

	<div class="col-lg-4">
			&nbsp;
		</div>

      <div class="row">
        <div class="col-lg-4">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2 class="form-signin-heading">Contact Us</h2>
		<input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
		<input type="text" class="form-control" name="email" placeholder="Email" required>
		<input type="text" class="form-control" name="org" placeholder="Organisation">
		<input type="text" class="form-control" name="loc" placeholder="Location" required>
		<input type="textarea" rows="10" cols="40" class="form-control" name="message" placeholder="Message" required>
	
		<button class="btn btn-lg btn-primary btn-block" type="submit">Send Enquiry</button>
	</form>
<?php

  // Check if the "from" input field is filled out
  if (isset($_POST["email"])) {
    // Check if "from" email address is valid
    $mailcheck = spamcheck($_POST["email"]);
    if ($mailcheck==FALSE) {
      echo "Invalid input";
    } else {
      $name = $_POST["name"];
      $from = $_POST["email"]; // sender
      $subject = "General Enquiry";
      $message = $_POST["message"];
      $org = $_POST["org"];
      $loc = $_POST["loc"];
      // message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
      // send mail
      mail("seridisand@hotmail.com",$name,$subject,$message,$loc, $org,"From: $email\n");
      echo "Thank you for sending us feedback";
    }
  }
?>

 	</div>

        <div class="col-lg-4">
	&nbsp;
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

