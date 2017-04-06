<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = 1;
	$popForm = getRate($id);

	if(isset($_POST['submit'])){
		$price = trim($_POST['price']);
		$tender = trim($_POST['tender']);

		$result = editRate($id, $price, $tender);			
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
		<h1>Edit Tour Pricing</h1>
			<p class="center"><?php if(!empty($message)){echo $message;}?></p>
			<form action="admin_editrates.php" method="post">
				<div class="editform">
					<label>Price</label><br>
					<input type="text" name="price" value="<?php echo $popForm['price_rate']; ?>"><br>
					<label>Valid Tenders</label><br>
					<input type="text" name="tender" value="<?php echo $popForm['price_tender']; ?>"><br>
				</div><br><br>

				<input class="redBut center" type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>