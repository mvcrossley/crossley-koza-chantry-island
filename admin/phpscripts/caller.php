<?php

	require_once('init.php');
	
	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		if($dir == 'logout'){
			logged_out();
		}else{
			echo "caller ID was passed incorrectly";
		}
	}
	function logged_out() //destroys session until next login, prevents further access
	{
		session_destroy();
		redirect_to("../admin_login.php");
	}


?>
