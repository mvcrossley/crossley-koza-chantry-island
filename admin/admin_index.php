<?php
	//require_once('phpscripts/init.php');
?>


<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>Admin Island - Home</title>
<link rel="stylesheet" href="css/main.css"/>
<link rel="stylesheet" href="../css/foundation.css">
</head>

<body>
	<section class"adminban row expanded" data-interchange="[../images/admin_mob.jpg, small], [../images/admin_tab.jpg, medium], [../images/admin_desk.jpg, large]">
		<h2 class="hide">Admin Banner Section</h2>
	</section>

	<section class="row expanded">
		<h2 class="hide">Main Section</h2>
		
		<div class="titlepanel small-12 medium-4 float-left columns">
			<h2>Admin Island Home</h2>
			<h3>Welcome to your admin panel (name), what would you like to do?</h3>
		</div>

		<div class="actionpanel small-12 medium-8 columns">
			<ul>
				<a href="admin_edituser.php"><li>Edit Member Profile</li></a>
				<a href="admin_createuser.php"><li>Create a New Member</li></a>
				<a href="admin_editcontent.php"><li>Edit Site Content</li></a>
			</ul>
		</div>
	</section>
</body>

</html>