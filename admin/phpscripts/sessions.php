<?php
	session_start(); //method

	function confirm_logged_in() { //make sure that user is logged in before accessing page
		if(!isset($_SESSION['users_creds'])){
			redirect_to('admin_login.php');
		} else {
		}
	}

	function logged_out() {
		session_destroy();
		redirect_to('../admin_login.php'); // need ../ so that we are going out of our folder to find this file
	}

?>
