<?php
	require_once('phpscripts/init.php');
	//confirm_logged_in();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$id = $_GET['id'];
	$popForm = getSched($id);

	if(isset($_POST['submit'])){
		$month = trim($_POST['month']);
		$day = trim($_POST['day']);
		$time = trim($_POST['time']);

		$result = editSched($id, $month, $day, $time);			
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
		<h1>Edit Tour Schedule</h1>
			<p class="center"><?php if(!empty($message)){echo $message;}?></p>
			<?php echo"<form action=\"admin_editsched.php?id={$id}\" method=\"post\">" ?>
				<div class="editform">
					<label>Month</label>
					<input type="text" name="month" value="<?php echo $popForm['sched_month']; ?>"><br>
					<label>Days</label>
					<input type="text" name="day" value="<?php echo $popForm['sched_day']; ?>"><br>
					<label>Times</label>
					<input type="text" name="time" value="<?php echo $popForm['sched_time']; ?>"><br>
				</div><br><br>

				<input class="redBut center" type="submit" name="submit" value="Save Changes">
			</form>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>