<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);
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

	<section class="row expanded">
		<div class="small-12 rows">
			<h1 class="">Welcome to your Chantry Island CMS</h1>
			<p>Choose an activity from the menu above.</p>
		</div>
	</section>


	<?php include("includes/footer.html");?>
</body>

</html>