<?php
	function editPost($id, $title, $date, $text){
		include("connect.php");
		$updatestring = "UPDATE tbl_news SET news_img='{$img}', news_title='{$title}', news_date='{$date}', news_text='{$text}' WHERE news_id={$id}";
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

	function getPost($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_news WHERE news_id = {$id}";
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

	function createPost($img, $title, $date, $text){
		require_once("connect.php");
		$userstring="INSERT INTO tbl_news VALUES(NULL,'{$img}','{$title}','{$date}','{$text}')";
		echo $userstring;

		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			$message = "New post created successfully.";
			return $message;
		}else{
			$message ="Unable to create new post.";
			return $message;
		}

		mysqli_close($link);
	}
	




?>