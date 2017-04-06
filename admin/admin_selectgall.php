<?php
	require_once('phpscripts/init.php');

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$tbl = "tbl_gallery";
    $id = "gallery_id";
    $thumb = "gallery_name";
    $getPhotos = getAll($tbl);
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Island - Select User</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<?php include("includes/header.html");?>
	<?php include("includes/menu.html");?>

	<div class="welcome row expanded">
		<h1>Choose an Image to Edit:</h1>
		<div class="small-12 columns">
			<ul class="userlist">
				<?php
	                if(!is_string($getPhotos)){
	                    while($row = mysqli_fetch_array($getPhotos)){
	                        echo    "<a href=\"admin_editgall.php?id={$row['gallery_id']}\"><img id=\"{$row['gallery_id']}\" class=\"galThumb\" src=\"../images/thumbs/{$row['gallery_thumb']}\" alt=\"{$row['gallery_desc']}\"></a>";
	                    }
	                } 
            	?>
			</ul>
		</div>
	</div>

	<?php include("includes/footer.html");?>
</body>
</html>