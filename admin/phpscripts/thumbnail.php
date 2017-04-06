<?php
	function thumbResize($fileType, $th_copy,$wmin,$hmin,$wmax,$hmax){
		list($wfull, $hfull) = getimagesize($th_copy);
		$scale_ratio = $wfull / $hfull;

		//SCALE IMAGE DOWN TO MIN WIDTH VARIABLES
		if(($wmin / $hmin) < $scale_ratio){
			$wmin = $hmin * $scale_ratio;
		}else{
			$hmin = $wmin / $scale_ratio;
		}

		//CROP POSITION VARIABLES
		$xcrop = ($wmin / 2) - ($wmax / 2);
		$ycrop = ($hmin / 2) - ($hmax / 2);

		$img = "";

		if($fileType == "image/jpg" || $fileType == "image/jpeg"){
			$img = imagecreatefromjpeg($th_copy);
		}else if($fileType == "image/png"){
			$img = imagecreatefrompng($th_copy);
		}

		$newImg = imagecreatetruecolor($wmax, $hmax);

		imagecopyresampled($newImg, $img, 0, 0, $xcrop, $ycrop, $wmin, $hmin, $wfull, $hfull);

		$newCopy = $th_copy;

		if($fileType == "image/jpg" || $fileType == "image/jpeg"){
			imagejpeg($newImg, $newCopy);
		}else if($fileType == "image/png"){
			imagepng($newImg, $newCopy);
		}
	}
?>