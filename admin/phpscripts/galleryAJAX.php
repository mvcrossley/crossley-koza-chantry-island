<?php
	include('connect.php');

	$picID = $_GET['gallery_image'];
	//echo $picID;
	$queryAll = "SELECT FROM tbl_gallery WHERE gallery_id = '$picID'";
	//echo $queryAll;
	$runAll = mysqli_query($link, $queryAll);
	$row = mysqli_fetch_assoc($runAll);	
	echo json_encode($row);
	//echo mysqli_num_rows($runAll);

?>