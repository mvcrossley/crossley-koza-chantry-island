<?php 
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function deletePost($tbl,$col,$id){
		include('connect.php');

		$query = "DELETE FROM {$tbl} WHERE {$col} = {$id}";
		$run = mysqli_query($link, $query);

		if($run){
			return $run;
		}else{
			$error =  "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
	mysqli_close($link);
	}

	function sendEmail($name,$phone,$email,$subject,$msg,$direct){
		$to = "chantryisland@bmts.com";
		$subj = $subject;
		$from = "Reply-To: {$email}";
		$body = "Name: {$name}\r\nPhone Number: {$phone}\n\nMessage: {$msg}";
		mail($to, $subj, $body, $from);
		redirect_to($direct);
	}

	function addPhoto($file, $thumb, $desc, $att){
		include("connect.php");
		
		$photoName = $_FILES['file']['name'];
		$fileType = $_FILES['file']['type'];
		$fileName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$ext = pathinfo($photoName, PATHINFO_EXTENSION);
		$thumbName = $photoName."_TH.".$ext;


		if(!empty($file)){//echo "Working";
			if($fileType == "image/jpg" || $fileType == "image/jpeg" || $fileType == "image/png"){

				$targetpath= "../images/gallery/{$file}";

				if(move_uploaded_file($fileName, $targetpath)){
					$orig = "../images/gallery/{$file}";
					$th_copy = "../images/thumbs/{$thumb}";

					if(!copy($orig, $th_copy)){
						echo "Failed to copy";
					}

					//FILE SIZE FOR GALLERY THUMBNAILS
					$wmin = 150;
					$hmin = 150;
					$wmax = 150;
					$hmax = 150;
					thumbResize($fileType, $th_copy,$wmin,$hmin,$wmax,$hmax); //Send to resize file
					
					$updatestring = "INSERT INTO tbl_gallery VALUES(NULL,'{$file}','{$thumb}','{$desc}','{$att}')";
					$updatequery = mysqli_query($link, $updatestring);

					if($updatequery){
						$message = "Changes saved successfully.";
						return $message;
					} else {
						$message = "Could not edit photo. Try again. (1)";
						return $message;
					}

					mysqli_close($link);
				}
			}else{
				$error = "The image you selected was not a JPG or PNG file type. Please try again.";
				return $error;
			}
		}else{
			$error =  "There was an error changing this information. Please contact your admin.";
			return $error;
		}
	}

	function editPhoto($id, $file, $thumb, $desc, $att){
		include("connect.php");
		
		$photoName = $_FILES['file']['name'];
		$fileType = $_FILES['file']['type'];
		$fileName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$ext = pathinfo($photoName, PATHINFO_EXTENSION);
		$thumbName = $photoName."_TH.".$ext;


		if(!empty($file)){//echo "Working";
			if($fileType == "image/jpg" || $fileType == "image/jpeg" || $fileType == "image/png"){

				$targetpath= "../images/gallery/{$file}";

				if(move_uploaded_file($fileName, $targetpath)){
					$orig = "../images/gallery/{$file}";
					$th_copy = "../images/thumbs/{$thumb}";

					if(!copy($orig, $th_copy)){
						echo "Failed to copy";
					}

					//FILE SIZE FOR GALLERY THUMBNAILS
					$wmin = 150;
					$hmin = 150;
					$wmax = 150;
					$hmax = 150;
					thumbResize($fileType, $th_copy,$wmin,$hmin,$wmax,$hmax); //Send to resize file
					
					$updatestring = "UPDATE tbl_gallery SET gallery_name='{$file}', gallery_thumb='{$thumb}', gallery_desc='{$desc}',gallery_att='{$att}' WHERE gallery_id={$id}";
					$updatequery = mysqli_query($link, $updatestring);

					if($updatequery){
						$message = "Changes saved successfully.";
						return $message;
					} else {
						$message = "Could not edit photo. Try again. (1)";
						return $message;
					}

					mysqli_close($link);
				}
			}else{
				$error = "The image you selected was not a JPG or PNG file type. Please try again.";
				return $error;
			}
		}else if(empty($file)){ //If a new photo or thumbnail hasn't been selected
			include("connect.php");
			$updatestring = "UPDATE tbl_gallery SET gallery_desc='{$desc}', gallery_att='{$att}' WHERE gallery_id={$id}";
			$updatequery = mysqli_query($link, $updatestring);

			if($updatequery){
				$message = "Changes saved successfully.";
				return $message;
			} else {
				$message = "Could not edit photo. Try again. (2)";
				return $message;
			}

			mysqli_close($link);
		}else{
			$error =  "There was an error changing this information. Please contact your admin.";
			return $error;
		}
	}

	function getPhoto($id){
		require_once("connect.php");
		$userstring = "SELECT * FROM tbl_gallery WHERE gallery_id = {$id}";
		$userquery = mysqli_query($link, $userstring);

		if($userquery){
			$foundUser = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $foundUser;
		} else {
			$error = "Gallery information could not be retrieved. Contact your administrator.";
			return $error;
		}
		mysqli_close($link);
	}

	
?>