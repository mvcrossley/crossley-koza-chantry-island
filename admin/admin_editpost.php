<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_GET['id'];
	$popForm = getPost($id);

	if(isset($_POST['submit'])){
		$img = trim($_POST['img']);
		$title = trim($_POST['title']);
		$date = trim($_POST['date']);
		$text = trim($_POST['text']);

		$result = editUser($id, $img, $title, $date, $text);			
		$message = $result;
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
		<h1>Edit User Account</h1>
			<?php if(!empty($message)){echo $message;}?>
			<?php echo"<form action=\"admin_editpost.php?id={$id}\" method=\"post\" enctype=\"multipart/form-data\">" ?>
				<div class="editform">
					<label>Article Image</label><br>
					<input type="file" name="img" value="<?php echo $popForm['news_img']; ?>"><br>
					<label>Article Title</label><br>
					<input type="text" name="title" value="<?php echo $popForm['news_title']; ?>"><br>
					<label>Date Posted</label><br>
					<input type="text" name="date" value="<?php echo $popForm['news_date']; ?>"><br>
					<label>Article Body</label><br>
					<textarea name="text" row="10" cols="50" value=""><?php echo $popForm['news_text'];?></textarea><br>
				</div><br><br>

				<input class="redBut center" type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>