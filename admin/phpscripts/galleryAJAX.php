<?php
	include ('config.php');

	$mysqli = new mysqli($config['mysql_server'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);

		if ($mysqli->connect_errno) {
			printf("Connection failed: %s \n", $mysqli->connect_error);
			exit();
		}
	$mysqli->set_charset("utf8");

	$picID = $_GET["gallery_id"];
		
	$queryAll = "SELECT * FROM {$tbl} WHERE {$id} = '$picID'";
	$runAll = mysqli_query($link, $queryAll);
	$row = mysqli_fetch_assoc($runAll);	
	echo json_encode($row);


	}	

?>