<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_GET['id'];
	$popForm = getPhoto($id);

	if(isset($_POST['submit'])){
		$file = $_FILES['file']['name'];
		$thumb = $_FILES['thumb']['name'];
		$desc = trim($_POST['desc']);
		$att = trim($_POST['att']);


		$result = editPhoto($id, $file, $thumb, $desc, $att);			
		$message = $result;
	}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Edit Photo</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<div class="small-12 columns">
		<h1>Edit Gallery Photo</h1>
			<p class="center"><?php if(!empty($message)){echo $message;}?></p>
			<?php echo"<form action=\"admin_editgall.php?id={$id}\" method=\"post\">" ?>
				<div class="editform">
					<label>File</label><br>
					<input type="file" name="file" value="<?php echo $popForm['gallery_name']; ?>"><br>
					<label>Thumbnail</label><br>
					<input type="file" name="thumb" value="<?php echo $popForm['gallery_thumb']; ?>"><br>
					<label>Description</label><br>
					<textarea rows="6" cols="50" name="desc" value=""><?php echo $popForm['gallery_desc'];?></textarea><br>
					<label>Attribution</label><br>
					<input type="text" name="att" value="<?php echo $popForm['gallery_att']; ?>">
				</div><br><br>

				<input class="redBut center" type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>