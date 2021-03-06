<?php 
	//require_once("admin/phpscripts/init.php");

	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$honeypot = $_POST['address'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
		$direct = "thankyou.php";
			if($honeypot==="") {
				//echo "Email sent";
				sendEmail($name,$phone,$email,$subject,$msg,$direct);
			} else {
				echo "Nice try, robot!";
			}
	} else {
		//echo "Don't be lazy, fill out the form";
	}
?>
  <section id="contactFooter" class="row expanded">
    <div class="row">
    <h2 class="hide">Contact</h2>
	    <div id="findUs" class="column small-12 large-7">
	    	<h3 class="center white">Find us</h3>
		    <div id="contactMap" class="column small-12 medium-7">
		    <div id="map"></div>
		    <div id="address-box"><input type="text" id="address"></div>
		    <div id="get-directions"><p><a>Get Directions</a></p></div>
		    	<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20483.485958391586!2d-81.40941953936849!3d44.48531083965202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8829ce5f8c20f7df%3A0x1401a4a7bb9f19b6!2sChantry+Island!5e0!3m2!1sen!2sca!4v1486589594754" style="border:0" allowfullscreen></iframe>-->
		    </div>

	    
		    <div id="contactInfo" class="column small-12 medium-5">
		    		<p>
						Call: <a href="tel:519-797-5862">+519-797-5862 </a><br>
		    			Toll Free: <a href="tel:1-866-797-5862">+1-866-797-5862 </a>
		    		</p>

		    		<p>
						<span>Mailing Address:</span><br>
						Marine Heritage Society<br>
						86 Saugeen St.<br>
						Southampton, Ontario<br>
						Canada, N0H 2L0
					</p>
					<p>					
						<span>Tour Location:*</span><br>
						86 Saugeen St.<br>
						Southampton, Ontario<br>
						Canada, N0H 2L0<br>
					</p>
					<p id="tourStip">
						*Tours must be booked and paid in advance. Visit our <a href="tours.php">Tour Page</a> for more information.
					</p>

					<p><span>Follow Us:</span>
						<a href="http://www.facebook.com/MarineHeritageSociety"><img alt="Facebook Icon" src="images/facebook.svg"></a>
						<a href="http://www.youtube.com/channel/UC5BwiLq9hSIl9BZRq7Q4UNA?feature=watch"><img alt="Youtube Icon" src="images/youtube.svg"></a>
					</p>			
		    </div>
		</div>

		<div id="contactUs" class="small-12 large-5 column ">
			<h3 class="white center">Contact Us</h3>
			<p>For more information, feel free to give us a quick call, or email us using our contact form below.</p>
		    <div id="contactForm" >
		    	
			    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="column small-12 formRows">
						<label>Name:</label>
						<input type="text" name="name" required> 
					</div>

					<div class="column small-12 medium-6 formRows">
						<label>Phone Number:</label>
						<input type="text" name="phone" required> 
					</div>

					<label class="hide">Address:</label>
					<input class="hide" type="text" name="address">

					<div class="column small-12 medium-6 formRows">
						<label>Email:</label>
						<input type="email" name="email" required>
					</div>
					
					<div class="column small-12 formRows">
						<label>Subject:</label>
						<input type="text" name="subject" required>
					</div>
					
					<div class="column small-12 formRows">
						<label>Message:</label>
						<textarea name="msg" required></textarea>
					</div>
					
					<div id="submitButton" class="column small-12 small-centered">
						<input type="submit" value="Send">
					</div>
				</form>
			</div>
		</div>
    </div>
    </section>

    <footer id="mainFooter" class="row">
    	<div id="toTop" class="blue">
    		<p><a href="#">Back To Top</a></p>
    		<object data="images/mobnavlogo.svg" type="image/svg+xml"></object>
    	</div>

	    <div id="bigNav">
	    	<object data="images/logo.svg" type="image/svg+xml"></object>
			<ul>
				<li><a href="index.php">Home</a></li>
          		<li><a href="island.php">About The Island</a></li>
          		<li><a href="tours.php">Tours</a></li>
          		<li><a href="volunteers.php">Volunteers</a></li>
          		<li><a href="volunteers.php#newsIntro">News &amp; Events</a></li>
          		<li><a href="gallery.php">Gallery</a></li>
          		<li><a href="donate.php">Donate</a></li>
          		<li><a href="#contactFooter">Contact</a></li>
	        </ul>
        </div>
    </footer>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    <script src="js/main.js"></script>
    <script src="js/maps.js"></script>      

</body>


 
</html>