<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function editPhoto($id, $file, $thumb, $desc, $att){
		include("connect.php");
		$updatestring = "UPDATE tbl_gallery SET gallery_name='{$file}',gallery_thumb='{$thumb}',gallery_desc='{$desc}',gallery_att='{$att}' WHERE gallery_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery){
			$message = "Changes saved successfully.";
			return $message;
		} else {
			$message = "Could not edit photo. Try again.";
			return $message;
		}
		mysqli_close($link);
	}

	function getPhoto($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_gallery WHERE gallery_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "Gallery information could not be retrieved. Contact your administrator.";
			return $error;
		}
		mysqli_close($link);
	}
?>