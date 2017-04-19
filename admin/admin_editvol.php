<?php
	require_once('phpscripts/init.php');
	confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_GET['id'];
	$popForm = getVol($id);

	if(isset($_POST['submit'])){
		$name = trim($_POST['name']);
		$pos = trim($_POST['pos']);
		$img = $_FILES['img']['name'];

		$result = editVol($id, $name, $pos, $img);			
		$message = $result;
	}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Edit Volunteer</title>
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
		<h1>Edit Volunteer</h1>
			<p class="center"><?php if(!empty($message)){echo $message;}?></p>
			<?php echo"<form action=\"admin_editvol.php?id={$id}\" method=\"post\" enctype=\"multipart/form-data\">" ?>
				<div class="editform">
					<label>Volunteer Name</label><br>
					<input type="text" name="name" value="<?php echo $popForm['vol_name']; ?>"><br>
					<label>Volunteer Position</label><br>
					<input type="text" name="pos" value="<?php echo $popForm['vol_pos']; ?>"><br>
					<label>Volunteer Portrait</label><br>
					<input type="file" name="img" value=""><br>
				</div><br><br>

				<input class="redBut center" type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>