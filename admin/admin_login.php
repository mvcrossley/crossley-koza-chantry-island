<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL); //for mac

	$ip = $_SERVER["REMOTE_ADDR"]; //grabs ip address for extra secure login

	
	//echo $ip; //wamp will show ::1 as ip

	require_once("phpscripts/init.php");

	if(isset($_POST['submit'])) {
		//echo "Congrats, you clicked it!";
		$username = trim($_POST['username']); //trim takes white space off beginning or end in case user copies or pastes
		$password = trim($_POST['password']);

		if($username != "" && $password != "") {//make sure username and password is NOT equal to nothing, double & required
			$result = logIn($username, $password, $ip);
			$message = $result;
			//echo "success!";
		}else{
			//echo "Please fill out the required fields.";
			$message = "Please fill out the required fields.";
		}
	}

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chantry Island | Gallery</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">

  </head>
  
  <body>
    <?php include("includes/header.html");?>

	<h1>Admin Login</h1>

	<?php if(!empty($message)) {echo $message;}	?>
		<form action="admin_login.php" method="post">
			<div class="upForm">
				<label>Username:</label><br>
				<input type="text" name="username" value=""><br>
			
				<label>Password:</label><br>
				<input type="password" name="password" value="">
			</div>

			<div class="loginbutton">
				<input type="submit" name="submit" value="Go!">
			</div>

		</form>

<?php include("includes/footer.html");?>