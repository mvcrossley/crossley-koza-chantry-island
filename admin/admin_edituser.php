<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_GET['id'];
	$popForm = getUser($id);

	if(isset($_POST['submit'])){
		$fullname = trim($_POST['fullname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);


		$result = editUser($id, $fullname, $username, $password, $email);			
		$message = $result;
	}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Island - Main Menu</title>

    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="css/main.css">
  </head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="row expanded">
		<div class="small-12 columns">
		<h1>Edit User Account</h1>
			<?php if(!empty($message)){echo $message;}?>
			<form action="admin_edituser.php" method="post">
				<div class="editform">
					<label>Full Name</label><br>
					<input type="text" name="fullname" value="<?php echo $popForm['user_fullname']; ?>"><br>
					<label>Username</label><br>
					<input type="text" name="username" value="<?php echo $popForm['user_name']; ?>"><br>
					<label>Password</label><br>
					<input type="text" name="password" value="<?php echo $popForm['user_pass']; ?>"><br>
					<label>Email</label><br>
					<input type="text" name="email" value="<?php echo $popForm['user_email']; ?>">
				</div><br><br>

				<input type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>

</body>
</html>