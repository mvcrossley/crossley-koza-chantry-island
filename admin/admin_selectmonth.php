<?php
	require_once('phpscripts/init.php');

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$tbl = "tbl_sched";
    $id = "sched_id";
    $username = "sched_month";
    $getmonths = getAll($tbl);
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
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<h1>Choose an Account to Edit:</h1>
		<div class="small-12 columns">
			<ul class="userlist">
				<?php
			        if(!is_string($getmonths)){
				        while($row = mysqli_fetch_array($getmonths)){
				        echo "<li class=\"center users\"><a href=\"admin_editsched.php?id={$row['sched_id']}\">{$row['sched_month']}</a></li>";
				        }
			        } 
			    ?>
			</ul>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>