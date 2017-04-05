<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	$ip = $_SERVER["REMOTE_ADDR"];

	require_once("phpscripts/init.php");

	if(isset($_POST['submit'])) {
		$username = trim($_POST['username']);//trimming any white space
		$password = trim($_POST['password']);

		if($username != "" && $password != ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "There is some information missing. Please fill out the required fields.";
		}
	}

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Island - Log In</title>

    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  
  <body>
    <?php include("includes/header.html");?>

	<h1>Log In to your Admin Island Account</h1>

	<?php if(!empty($message)) {echo $message;}	?>
		<form class="logForm" action="admin_login.php" method="post">
			<div>
				<label>Username:</label><br>
				<input type="text" name="username" value=""><br>
			
				<label>Password:</label><br>
				<input type="password" name="password" value="">
			</div>

			<div class="logbut">
				<input type="submit" name="submit" value="Go!">
			</div>

		</form>

<?php include("includes/footer.html");?>