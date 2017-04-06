<?php
	session_start(); //method
	require_once('init.php');

	function confirm_logged_in() { //make sure that user is logged in before accessing page
		if(!isset($_SESSION['users_creds'])){
			redirect_to('admin_login.php');
		} else {
		}
	}

	function logged_out() //destroys session until next login, prevents further access
	{
		session_destroy();
		redirect_to("../admin_login.php");
	}
?>
