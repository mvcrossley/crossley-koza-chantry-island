<?php
	function createUser($fname, $lname, $username, $email, $level){
		require_once("connect.php");
		$ip=0;
		$pstatus="New";
		$time="This is your first session.";
		$attempts=0;
		$locked=0;
		$password=password_hash("newpass", PASSWORD_DEFAULT);
		$userstring="INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$username}','{$password}','{$pstatus}','{$email}','{$time}','{$ip}','{$attempts}','{$locked}','{$level}')";
		echo $userstring;
		//creating new entry in database - ORDER MATTERS, EACH VALUE SHOULD BE IN SAME ORDER AS IN DATABASE
		//Must have a space for ALL columns in database, or this will either not work or will put values in the wrong places
		//entry for ID MUST be NULL so that user cannot choose their own ID
		//echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
				//function sendMessage($name,$email,$company,$msg,$direct) {
				$to = "la_koza04@hotmail.com"; //CHANGE TO {$email} AFTER TESTING
				$subj = "Paddy's Pub - New Account Setup";
				//$from = "Reply-To: admin@paddyspub.com";
				$msg = "Name: {$fname} {$lname}\r\nAccount Type: {$level}\r\nUsername: {$username}\r\nTemporary Password: {$password}\r\nFollow this link to finish your account setup: http://localhost/koza_lauren_3014_r3/admin/admin_login.php";
				mail($to, $subj, $msg);

		redirect_to("email_sent.php");

		//redirect_to($direct);
		}else{
			$message ="Unable to create account.";
			return $message;
		}

		mysqli_close($link);
	}

	function firstPassword($password, $id){
		require_once("connect.php");
		$time = time();
		$userstring="UPDATE tbl_user SET user_password='{$password}', user_pstatus='{$time}'  WHERE user_id={$id}";

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to("phpscripts/caller.php?caller_id=logout");
		}else{
			$message ="Unable to change password.";
			return $message;
		}

		mysqli_close($link);
	}

	function getUser($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_user WHERE user_id = {$id}"; //create query
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "There was an error reaching your user info. Please contact IT.";
			return $error;
		}

		//run query
		//gather object, fetch array
		//return
		//else
		//error message//return
		mysqli_close($link);
	}

	function editUser($id, $fname, $lname, $username, $password, $email){
		include("connect.php"); //must include as we need it more than once when switching to new functions
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_lname='{$lname}', user_username='{$username}', user_password='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery){
			redirect_to("admin_index.php");
		} else {
			$message = "Not happening!";
			return $message;
		}


		mysqli_close($link);
	}




?>