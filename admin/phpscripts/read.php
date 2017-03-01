<?php

	function getAll($tbl) { //get all gallery thumbnails
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		//$row = mysqli_fetch_assoc($runAll);	
		//echo json_encode($row);

		if($runAll){
			return $runAll;
		}else{
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
	}

/*	function getPic($tbl) { //get specific gallery pic
		include('connect.php');
		$picID = $_GET["gallery_id"];
		$queryAll = "SELECT * FROM {$tbl} WHERE {$id} = '$picID'";
		$runAll = mysqli_query($link, $queryAll);
		$row = mysqli_fetch_assoc($runAll);	
		//echo json_encode($row);

		if($runAll){
			return $runAll;
		}else{
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}

	}	
*/
?>