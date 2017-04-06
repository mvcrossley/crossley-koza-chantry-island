<?php
	function editSched($id, $month, $day, $time){
		include("connect.php");
		$updatestring = "UPDATE tbl_sched SET sched_month='{$month}', sched_day='{$day}', sched_time='{$time}' WHERE sched_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery){
			$message = "Changes saved successfully.";
			return $message;
		} else {
			$message = "Could not edit schedule. Try again.";
			return $message;
		}
		mysqli_close($link);
	}

	function getSched($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_sched WHERE sched_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "Schedule information could not be retrieved. Contact your administrator.";
			return $error;
		}
		mysqli_close($link);
	}
?>