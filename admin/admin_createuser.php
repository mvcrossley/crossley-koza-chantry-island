<?php
	require_once('phpscripts/init.php');
	confirm_logged_in(); //Confirms that the user has, indeed logged in, in order to access page.

	if(isset($_POST['submit'])){
		//echo "works";
		$fullname = trim($_POST['fullname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);

		$result = createuser($fullname, $username, $email);
		$message = $result;
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
	<h1>Create User Account</h1>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_createuser.php" method="post">
			<div class="createForm">
				<label>Full Name:</label><br>
				<input type="text" name="lname" value="<?php if(!empty($lname)){echo $lname;} ?>"><br>
				<label>Username:</label><br>
				<input type="text" name="username" value="<?php if(!empty($username)){echo $username;} ?>"><br>
				<label>Email:</label><br>
				<input type="text" name="email" value="<?php if(!empty($email)){echo $email;} ?>"><br>
				<br><br>
			</div>

			<div class="logbut">
				<input type="submit" name="submit" value="Create User">
			</div>

		</form>

	</body>
</html>