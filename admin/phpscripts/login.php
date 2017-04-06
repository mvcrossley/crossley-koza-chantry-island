<?php

	function logIn($username, $password, $ip){
		require_once("connect.php");

		$username = mysqli_real_escape_string($link,$username);
		$password = mysqli_real_escape_string($link,$password);

		$loginString = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
		$user_set = mysqli_query($link,$loginString);


		if(mysqli_num_rows($user_set)){
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);		

			$id = $found_user['user_id']; 

			$_SESSION['users_creds'] = $id;
			$_SESSION['user_fullname'] = $found_user['user_fullname'];

			redirect_to('admin_index.php');//redirect to this page when successfully logged in


		}else{ //If username/password is incorrect
			$message = "Sorry, your username or password is incorrect. Try again, or contact the admin.";
			return $message;
		}

		mysqli_close($link);
	}

	?>