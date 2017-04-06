 <?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    require_once('admin/phpscripts/init.php');

        $tbl = "tbl_vol";
        $id = "vol_id";
        $name = "vol_name";
        $pos = "vol_pos";
        $getVol = getAll($tbl);

        $tbl = "tbl_news";
        $id = "news_id";
        $img = "news_img";
        $title = "news_title";
        $date = "news_date";
        $text = "news_text";
        $getPost = getAll($tbl);
?>

<body>
    <?php include("includes/header.html");?>

    <h1 class="hide">About Page</h1>
    <section id="aboutbanner" class="sameLook row expanded">
    <h2 class="hide">About Page Banner</h2>
        <div class="sideImage small-12 medium-6 large-7 float-left columns" data-interchange="[images/mobdonbanner.jpg, small], [images/tabdonbanner.jpg, medium], [images/deskdonbanner.jpg, large]">
        </div>

        <div class="small-12 medium-6 large-5 float-right columns">
            <h2 class="white center">The Marine Heritage Society</h2>
            <p class="white">The Marine Heritage Society is a not-for-profit group of volunteers dedicated to the preservation and enhancement of our community's marine history. The objective of the Society is to identify, preserve and restore material items of marine historical significance and to raise sufficient funds to support these endeavors. They are also winner of the 2010 "Locals Know" Canada wide competition.</p>
            <div class="center show-for-small-only"><a href="#bluehelp"><img class="downarrow" src="images/whitearrow.svg" alt="An arrow to go down a section"></a></div>
        </div>
    </section>

    <section id="ourVolunteers" class="row">
    <h2 class="hide">Our Volunteers Sections</h2>
      <div class="small-12 medium-12 large-8 large-centered columns">
        <h2 class="red center">Our Volunteers</h2>
        <p class="center">Since so many people volunteer their time and energy to help our organization function, we have dedicated this section to our wonderful volunteers. Thank you all very much, this would not be possible without your time and donations.</p>
      </div>
    </section>

    <section class="row">
    <h2 class="hide">A list of all of our volunteers</h2>
      <?php
        if(!is_string($getVol)){
          while($row = mysqli_fetch_array($getVol)){
            echo    "<div  class=\"volunteers center small-8 medium-4 large-3 columns end\">
            <p>{$row['vol_name']}{$row['vol_pos']}</p>
            </div>";
          }
        } 
      ?>
    </section>


    <section id="volVids" class="row">
      <div id="vidList">
      <h2 class="center red">Volunteer Interviews</h2>

        <div class="volVid medium-12 large-4 column">
            <iframe src="https://www.youtube.com/embed/MJpCTSwqCHE" allowfullscreen></iframe>
            <h3>Jane Kramer</h3>
            <p>The Marine Heritage Society present Jane Kramer speaking about her involvement with the volunteer restoration of the Chantry Island Lighthouse and Keeper's Cottage.</p>
        </div>
        <div class="volVid medium-12 large-4 column">
            <iframe src="https://www.youtube.com/embed/N27M4OmubxI" allowfullscreen></iframe>
            <h3>Mike Sterling</h3>
            <p>Mike Sterling speaks about his contribution towards the Marine Heritage Society.</p>
        </div>
        <div class="volVid medium-12 large-4 column">
            <iframe src="https://www.youtube.com/embed/hbGffSYF5LU" allowfullscreen></iframe>
            <h3>Bob Trelford</h3>
            <p>Bob Trelford Speaks about the restoration of Chantry Island and the Marine Heritage Society.</p>
        </div>
      </div>
    </section>

    <section id="newsIntro" class="row">
        <div id="nIntro" class="sameLook">
          <h2 class="center white">News &amp; Events</h2>
            <p class="white">Welcome to our News &amp; Events page. Here we'll cover our projects, upcoming events and things you don't want to miss. Don't forget to connect to our Facebook page as well to find out more.

            Check back soon for more updates about the island and Heritage Society. Expect to see more frequent updating during our operating season end of May to mid-September. View schedules for exact dates.</p>
      </div>
    </section>

    <section id="newsList" class="row">
        <div id="nList">
          <h2 class="hide">News List</h2>
            <?php
              if(!is_string($getPost)){
                while($row = mysqli_fetch_array($getPost)){
                  echo "<div class=\"nArticle small-12 column\">
                          <div class=\"articletext small-12 large-6 column\">
                            <h3>{$row['news_title']}</h3>
                            <p><span>{$row['news_date']}</span></h3>
                            <p>{$row['news_text']}</p>
                          </div>
                          <div class=\"articleimg small-12 large-6 column\">
                            <img src=\"images/{$row['news_img']}\" alt=\"{$row['news_title']}\">
                          </div>
                      </div>";
                }
              } 
            ?>
      </div>
    </section>

    <section class="credits row expanded">
    <h1 class="hide">Photographers</h1>
        <div class="small-12 columns">
            <p class="center">
                Banner Photo: Wayne MacDonald
            </p>
        </div>
    </section>

    <?php include("includes/footer.html");?>


