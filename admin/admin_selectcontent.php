<?php
	require_once('phpscripts/init.php');

	ini_set('display_errors',1);
	error_reporting(E_ALL);

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Select User</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<h1>Choose a Month to Edit:</h1>
		<div class="small-12 columns">
			<ul class="userlist">
				<li class="center"><a href="admin_editrates.php">Edit Tour Prices</a></li>
				<li class="center"><a href="admin_selectgall.php">Edit Gallery</a></li>
				<li class="center"><a href="admin_selectmonth.php">Edit Tour Schedule</a></li>
				<li class="center"><a href="admin_createpost.php">Make a News Post</a></li>
				<li class="center"><a href="admin_editpost.php">Edit a News Post</a></li>
			</ul>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>