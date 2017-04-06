<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in(); //Confirms that the user has, indeed logged in, in order to access page.

	if(isset($_POST['submit'])){
		$fullname = trim($_POST['fullname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);

		$result = createuser($username, $password, $email, $fullname);
		$message = $result;
		}
?>


<!doctype html>

<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Create a User</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
</head>

	<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<h1>Create User Account</h1>
		<p class="center"><?php if(!empty($message)){echo $message;}?></p>
		<form action="admin_createuser.php" method="post">
			<div class="createForm">
				<label>Full Name:</label><br>
				<input type="text" name="fullname" value=""><br>
				<label>Username:</label><br>
				<input type="text" name="username" value=""><br>
				<label>Password:</label><br>
				<input type="text" name="password" value=""><br>
				<label>Email:</label><br>
				<input type="text" name="email" value=""><br>
				<br><br>
			</div>

			<div>
				<input class="redBut" type="submit" name="submit" value="Create User">
			</div>

		</form>
	<?php include("includes/footer.html");?>
	</body>
</html>