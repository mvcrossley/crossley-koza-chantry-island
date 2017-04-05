<?php
	require_once('phpscripts/init.php');
	confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_SESSION['users_creds']; //currently holding ID
	$popForm = getUser($id);
	//echo $id;
	//echo $popForm['user_name'];

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fullname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);


		$result = edituser($id, $fullname, $username, $password, $email);			
		$message = $result;
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Island - Edit User</title>
<link rel="stylesheet" href="css/main.css"/>
</head>

	<body>
	<h1>Edit User Account</h1>
		<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_edituser.php" method="post">
		<div class="upForm">
			<label>First Name:</label><br>
			<input type="text" name="fullname" value="<?php echo $popForm['user_fname']; ?>"><br>
			<label>Last Name:</label><br>
			<input type="text" name="username" value="<?php echo $popForm['user_username']; ?>"><br>
			<label>Password:</label><br>
			<input type="text" name="password" value="<?php echo $popForm['user_password']; ?>"><br>
			<label>Email:</label><br>
			<input type="text" name="email" value="<?php echo $popForm['user_email']; ?>">
		</div>
			
			<br><br>

			<input type="submit" name="submit" value="Apply Account Edits">

		</form>

	</body>
</html>