<?php
	require_once('phpscripts/init.php');
	confirm_logged_in();

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
<title>Admin Island - Create News Article</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

	<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<h1>Post a News Article</h1>
		<p class="center"><?php if(!empty($message)){echo $message;}?></p>
		<form action="admin_createuser.php" method="post" enctype="multipart/form-data">
			<div class="createForm">
				<label>Article Image</label><br>
				<input type="file" name="img" value=""><br>
				<label>Title</label><br>
				<input type="text" name="username" value=""><br>
				<label>Date</label><br>
				<input type="text" name="password" value=""><br>
				<label>Text</label><br>
				<textarea name="text" value="" row="6" cols="60"></textarea><br>
				<br><br>
			</div>

			<div>
				<input class="redBut" type="submit" name="submit" value="Post Story">
			</div>

		</form>
	<?php include("includes/footer.html");?>
	</body>
</html>