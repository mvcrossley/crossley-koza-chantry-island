<?php
	require_once('phpscripts/init.php');
	confirm_logged_in(); //session will fully log out if you shut down entire browser, not just by closing tab

	$id = $_SESSION['users_creds'];
	//echo $id;
	$lastSession = $_SESSION['users_time'];
	//echo $lastSession;

	

	date_default_timezone_set('America/New_York');
	$hour = date('G');
	//echo $hour;
	/*if($hour >= 16 || $hour < 5){
		echo "hey!";
	}*/


?>


<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>Welcome to Paddy's Secret Admin</title>
<link rel="stylesheet" href="css/main.css"/>
</head>

	<body>
		<div class="contentCon">
			<h1><?php 	if ($hour >= 5 && $hour < 12) {echo "Good Morning";} 
						else if ($hour >= 12 && $hour < 16) {echo "Good Afternoon";}
						else if ($hour >= 16 || $hour < 5) {echo "Good Evening";}?>,
				<?php echo $_SESSION['users_name'];?>!<br>
				<span>Welcome to Paddy's secret admin.</span>
			</h1>
				<img alt="the gang" src="images/the-gang.png">
		</div>

		<div id="lastLog">
			<p>Your last login was on: <?php echo $lastSession ?></p>
		</div>

		<div id="logoff">
			<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
			<a href="admin_createuser.php">Create New Account</a>
			<a href="admin_edituser.php">Edit Your Account</a>
		</div>
		

	</body>
</html>