<?php
	function createUser($username, $password, $email, $fullname){
		require_once("connect.php");
		$userstring="INSERT INTO tbl_user VALUES(NULL,'{$username}','{$password}','{$email}','{$fullname}')";
		echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			$to = "{$email}";
			$subj = "Chantry Island - New Account";
			$msg = "Name: {$fullname}\r\nUsername: {$username}\r\nPassword: {$password}\r\nWelcome to Chantry's Tours' Admin Island.";
			mail($to, $subj, $msg);

			$message = "New user created successfully. A confirmation email will be sent to the email address entered, which contains log-in information.";
			return $message;
			//redirect_to("admin_login.php");
		}else{
			$message ="Unable to create account.";
			return $message;
		}

		mysqli_close($link);
	}

	function editUser($id, $username, $password, $email, $fullname){
		include("connect.php");
		$updatestring = "UPDATE tbl_user SET user_name='{$username}', user_pass='{$password}', user_email='{$email}', user_fullname='{$fullname}' WHERE user_id={$id}";
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

	function getUser($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_user WHERE user_id = {$id}";
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