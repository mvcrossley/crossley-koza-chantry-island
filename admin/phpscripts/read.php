<?php
	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);

		if($runAll){
			return $runAll;
		}else{
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
	}
?>