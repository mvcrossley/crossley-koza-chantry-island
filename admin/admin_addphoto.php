<?php
	require_once('phpscripts/init.php');
	confirm_logged_in(); //comment out so you can test page without having to login

	if(isset($_POST['submit'])){
		//echo "works";
		$password = $_POST['password'];
		$conpassword = $_POST['conpassword'];
		$id = $_SESSION['users_creds'];

		if(empty($password) && empty($conpassword) OR empty($password) || empty($conpassword) ){
			$message = "Please enter new password.";
		} else if ($password === $conpassword){
			$result = firstPassword($password, $id);
			//$message = "Thanks for selecting me";
			$message = $result;
		} else {
			$message = "Passwords don't match. Please try again.";
		}
	}

?>


<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>Welcome Company Name</title>
<link rel="stylesheet" href="css/main.css"/>
</head>

	<body>
	<h1>Setup Account Password</h1>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_setupaccount.php" method="post">

			<div class="upForm">
				<label>New Password:</label><br>
				<input type="text" name="password"><br>

				<label>Confirm Password:</label><br>
				<input type="text" name="conpassword"><br>

				<p>IMPORTANT:<br>
				Once you set your new password, you will be asked to login again.<br>
				If you do not login within 5 minutes, your account will be locked.</p>

			</div>

			<div class="logoff">
				<input type="submit" name="submit" value="Change Password">
			</div>

		</form>

	</body>
</html>