<?php
	require_once('phpscripts/init.php');
	confirm_logged_in();
	ini_set('display_errors',1);
	error_reporting(E_ALL);

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Select Content</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<h1>What Content Would You Like to Edit?</h1>
		<div class="small-12 columns">
			<ul class="userlist">
				<li class="center"><a href="admin_editrates.php">Edit Tour Prices</a></li>
				<li class="center"><a href="admin_selectmonth.php">Edit Tour Schedule</a></li>
				<li class="center"><a href="admin_selectgall.php">Edit Gallery</a></li>
				<li class="center"><a href="admin_addgall.php">Add Gallery Image</a></li>
				<li class="center"><a href="admin_selectpost.php">Edit a News Article</a></li>
				<li class="center"><a href="admin_createpost.php">Post a News Article</a></li>
			</ul>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>