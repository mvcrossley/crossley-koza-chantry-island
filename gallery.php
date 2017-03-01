<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    require_once('admin/phpscripts/init.php');

        $tbl = "tbl_gallery";
        $id = "gallery_id";
        $desc = "gallery_desc";
        $att = "gallery_att";
        $getPhotos = getAll($tbl);
?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chantry Island | Gallery</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/gallery.css">

  </head>
  
  <body>
    <?php include("includes/header.html");?>

    <h1 class="hide">Gallery Page</h1>
    <section id="gallerybanner" class="sameLook row expanded">
    <h2 class="hide">Gallery Page Banner</h2>
        <div class="sideImage small-12 medium-6 large-7 float-left columns" data-interchange="[images/mobgalbanner.jpg, small], [images/tabgalbanner.jpg, medium], [images/deskgalbanner.jpg, large]">
        </div>

        <div class="small-12 medium-6 large-5 float-right columns">
            <h2 class="white center">Photo Gallery</h2>
            <p class="white">Welcome to our photo gallery. This section includes pictures of Chantry Island and the area of Lake Huron surrounding the Island. It also includes pictures of the lighthouse and keeper's cottage inside and out, as well as photos of some of the birds and flowers native to the island.<br>If you have photos of Chantry Island that you would like to share with us, connect with our Facebook page.</p>
            <div class="center show-for-small-only"><a href="#bluehelp"><img class="downarrow" src="images/whitearrow.svg" alt="An arrow to go down a section"></a></div>
        </div>
    </section>


    <section id="galleryPics" class="row expanded">
    <div id="galLightbox">
        <div id="lightboxExit">
            <a><p>x</p></a>
        </div>
        <div id="lightboxImg">
            <img src="images/gallery/base.jpg" alt="this is the base image">
        </div>
        <div id="lightboxDesc">
            <p>Photo by:</p>
            <p><span>This is the photo description</span></p>
        </div>
        <div id="lightboxCtrls">
            <p><a id="galprev"><< Prev </a> | <a id="galnext"> Next >></a></p>
        </div>
    </div>

    <div id="galleryThumbs" class="row">
       <?php
            if(!is_string($getPhotos)){
                while($row = mysqli_fetch_array($getPhotos)){
                    echo    "<div  class=\"small-3 medium-2 large-1 column end\">
                                <a><img id=\"{$row['gallery_id']}\" class=\"galThumb\" src=\"images/thumbs/{$row['gallery_thumb']}\" alt=\"{$row['gallery_desc']}\"></a>
                             </div>";
                }
            } 
        ?>
    </div>


    </section>


    <?php include("includes/footer.html");?>