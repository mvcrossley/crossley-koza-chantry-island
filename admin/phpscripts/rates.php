<?php
	function editRate($id, $price, $tender){
		include("connect.php");
		$updatestring = "UPDATE tbl_price SET price_rate='{$price}', price_tender='{$tender}' WHERE price_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery){
			$message = "Changes saved successfully.";
			return $message;
		} else {
			$message = "Could not edit price. Try again.";
			return $message;
		}
		mysqli_close($link);
	}

	function getRate($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_price WHERE price_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "Pricing information could not be retrieved. Contact your administrator.";
			return $error;
		}
		mysqli_close($link);
	}

	




?>