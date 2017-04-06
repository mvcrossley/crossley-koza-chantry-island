<?php
	include('connect.php');

	$picID = $_GET['gallery_image'];
	$queryAll = "SELECT * FROM tbl_gallery WHERE gallery_id = '$picID'";
	$runAll = mysqli_query($link, $queryAll);
	$row = mysqli_fetch_assoc($runAll);	
	echo json_encode($row);

?>