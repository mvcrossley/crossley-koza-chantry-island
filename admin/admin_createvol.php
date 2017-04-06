<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in(); //Confirms that the user has, indeed logged in, in order to access page.

	if(isset($_POST['submit'])){
		$name = trim($_POST['name']);
		$pos = trim($_POST['pos']);
		$img = trim($_POST['img']);

		$result = createvol($name, $pos, $img);
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
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

	<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<h1>Create Volunteer</h1>
		<p class="center"><?php if(!empty($message)){echo $message;}?></p>
		<form action="admin_createvol.php" method="post" enctype="multipart/form-data">
			<div class="createForm">
				<label>Volunteer Name</label><br>
				<input type="text" name="name" value=""><br>
				<label>Volunteer Position</label><br>
				<input type="text" name="pos" value=""><br>
				<label>Volunteer Portrait</label><br>
				<input type="file" name="img" value="<?php echo $popForm['vol_img']; ?>"><br>
				<br><br>
			</div>

			<div>
				<input class="redBut" type="submit" name="submit" value="Create Volunteer">
			</div>

		</form>
	<?php include("includes/footer.html");?>
	</body>
</html>