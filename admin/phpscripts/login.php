<?php

	function logIn($username, $password, $ip){
		require_once("connect.php");
		//clean username and password to prevent SQLI injection attacks
		$username = mysqli_real_escape_string($link,$username);
		$password = mysqli_real_escape_string($link,$password);

		$loginString = "SELECT * FROM tbl_user WHERE user_username = '{$username}' AND user_password = '{$password}'";
		$attemptString = "SELECT user_attempts, user_locked_time FROM tbl_user WHERE user_username = '{$username}'";
		//echo $attemptString;
		$setupString = "SELECT user_time FROM tbl_user WHERE user_username = '{$username}'";

		date_default_timezone_set('America/New_York');
		$getTime = time();
		$newTime = date("F jS, Y g:ia", $getTime);

		$user_set = mysqli_query($link,$loginString);
		$user_attempts = mysqli_query($link,$attemptString);
		$account_setup = mysqli_query($link,$setupString);

		$found_attempt = mysqli_fetch_array($user_attempts, MYSQLI_ASSOC);
		$attempts = $found_attempt['user_attempts'];
		$lockout = $found_attempt['user_locked_time'];

		//$found_setup = mysqli_fetch_array($account_setup, MYSQLI_ASSOC);
		//$needSetup = $found_setup['user_time'];
		//echo $needSetup;

		if(mysqli_num_rows($user_set)){
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);		

			$id = $found_user['user_id']; 
			//$time = $found_user['user_time'];

			$_SESSION['users_creds'] = $id;
			$_SESSION['users_name'] = $found_user['user_fname'];
			$_SESSION['users_time'] = $found_user['user_time'];
			$_SESSION['users_pstatus'] = $found_user['user_pstatus'];
			$pstatus = $_SESSION['users_pstatus'];

			if(mysqli_query($link, $loginString)){ //If username and password are right
				$updateIP = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id = {$id}";
				$updateIPQuery = mysqli_query($link, $updateIP);
				$updateTime = "UPDATE tbl_user SET user_time = '{$newTime}' WHERE user_id = {$id}";
				$updateTimeQuery = mysqli_query($link, $updateTime);
				
				$timeleft = (time() - $lockout); // amount of time after lockout
				if ($timeleft < 1000){ //if still in lockout time
					$message = "I'm afraid your login attempts are at capacity. Your account is now locked. Please try again in a few minutes.";
					return $message;
				} else {
					$updateAttempt =  "UPDATE tbl_user SET user_attempts = '0' WHERE user_id = {$id}";
					$updateAttemptQuery = mysqli_query($link, $updateAttempt);
				}

				if($_SESSION['users_time'] === "This is your first session."){ //check if account setup needed
					redirect_to('admin_setupaccount.php');
				} else if($pstatus=="Clear"){ //check if status is clear
					//redirect_to('admin_index.php');
				} else if ( ($pstatus + 300) >= time() ){ //if setup required, 5 minutes to login before account lockdown
					$pstatus = "Clear";
					$updatePStatus = "UPDATE tbl_user SET user_pstatus = '{$pstatus}' WHERE user_id = {$id}";
					$updatePSQuery = mysqli_query($link, $updatePStatus);
					//redirect_to('admin_index.php');
				} else { //if pstatus is over, become frozen
					$pstatus = "Frozen";
					$updatePStatus = "UPDATE tbl_user SET user_pstatus = '{$pstatus}' WHERE user_id = {$id}";
					$updatePSQuery = mysqli_query($link, $updatePStatus);
					$message = "You took too long to sign in. Your account has been suspended. Please contact your system admin.";
					return $message;
				}

			}

			redirect_to('admin_index.php');//redirect to this page when successfully logged in


		}else{ //If username/password is incorrect
			if($attempts == 0){ //couldn't get $attempt to add up with +1, so I had to do the long way
				$updateAttempt = "UPDATE tbl_user SET user_attempts = '1' WHERE user_username = '{$username}'";
				$updateAttemptQuery = mysqli_query($link, $updateAttempt);
				$message = "Your username/password is incorrect. You have 2 more attempts before you are locked out.";
				return $message;
			} else if($attempts == 1){
				$updateAttempt = "UPDATE tbl_user SET user_attempts = '2' WHERE user_username = '{$username}'";
				$updateAttemptQuery = mysqli_query($link, $updateAttempt);
				$message = "Your username/password is incorrect. You have 1 more attempt before you are locked out.";
				return $message;
			} else if($attempts == 2) {
				$updateLocked = "UPDATE tbl_user SET user_locked_time = '{$getTime}' WHERE user_username = '{$username}'";
				$updateLockedQuery = mysqli_query($link, $updateLocked);

				$timeleft = (time() - $lockout); // amount of time after lockout
				if ($timeleft < 1000){ //if amount of time after lockout is less than 1000
					$message = "I'm afraid your login attempts are at capacity. Your account is now locked. Please try again in a few minutes.";
					return $message;
				} else {
					$updateAttempt = "UPDATE tbl_user SET user_attempts = '2' WHERE uer_username = '{$username}'";
					$updateAttemptQuery = mysqli_query($link, $updateAttempt);
					//$message = "Still not right, but we'll give you another chance.";
					//return $message;
				}
			} 
		}

		mysqli_close($link);
	}

	?>