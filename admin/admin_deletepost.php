<?php
	require_once('phpscripts/init.php');
	confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$tbl = $_GET['table'];
	$id = $_GET['id'];
	$col = $_GET['col'];

	if (isset($_POST['yes'])){
		$deletePost = deletePost($tbl,$col,$id);
		redirect_to('admin_index.php');
	}
	if (isset($_POST['no'])){
		redirect_to('admin_index.php');
	}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Edit User</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<div class="small-12 columns">
		<h1>Permanently Delete Post</h1>
			<p class="center">Are you sure you want to permanently delete this post? Once deleted, this infomation cannot be recovered.</p>
			<?php if(!empty($message)){echo $message;}?>
			<?php echo "<form action=\"admin_deletepost.php?table={$tbl}&col={$col}&id={$id}\" method=\"post\">"; ?> 
				<input class="redBut center" type="submit" name="yes" value="Yes, Delete this Post">
				<input class="blueBut center" type="submit" name="no" value="No, Go Back">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>