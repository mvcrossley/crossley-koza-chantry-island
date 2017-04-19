<?php
	function createVol($name, $pos, $img){
		require_once("connect.php");
		$userstring="INSERT INTO tbl_vol VALUES(NULL,'{$name}','{$pos}','{$img}')";
		//echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			$message = "New volunteer created successfully.";
			return $message;
		}else{
			$message ="Unable to create volunteer.";
			return $message;
		}

		mysqli_close($link);
	}

	function editVol($id, $name, $pos, $img){
		include("connect.php");
		$updatestring = "UPDATE tbl_vol SET vol_name='{$name}', vol_pos='{$pos}', vol_img='{$img}' WHERE vol_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery){
			$message = "Changes saved successfully.";
			return $message;
		} else {
			$message = "Could not edit user. Try again.";
			return $message;
		}
		mysqli_close($link);
	}

	function getVol($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_vol WHERE vol_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "User information could not be retrieved. Contact your administrator.";
			return $error;
		}
		mysqli_close($link);
	}
?>