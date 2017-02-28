(function(){

	var httpRequest,
	photoThumb = document.querySelectorAll('.galThumb'),
	nextPhoto = document.querySelector('#galnext'),
	prevPhoto = document.querySelector('#galprev'),
	i;

		for(i=0; i<photoThumb.length; i++){
			
			photoThumb[i].addEventListener('click', clickedButton, false);
			photoThumb[i].addEventListener('click', function(e) {makeRequest('gallery_image_'+e.currentTarget.id+'.html');}, false);

			function clickedButton(e){
				//console.log("clicked!");
				console.log(e.currentTarget.id);
			}
			
			function makeRequest(url,e){
				httpRequest = new XMLHttpRequest();
				//var buttonID = url.currentTarget.id;

				if(!httpRequest){ // Checking to make sur ethe browser isn't too old	
					alert('Sorry, your browser is too old to access this content.');
					return false; // This exits out of a function, will execute the next line after function is closed
				}

				httpRequest.onreadystatechange = switchPhoto;				
				httpRequest.open('GET', 'admin/galleryAJAX.php?picID='+3, true); //Passing in a url through a get protocol, in this case, the "text.txt" file
				httpRequest.send();

			}

			function switchPhoto(e){

				if(httpRequest.readyState === XMLHttpRequest.DONE) {
					if(httpRequest.status === 200) {
						console.log("triggered");
						var response =  JSON.parse(httpRequest.responseText);
						//var jsondoc = JSON.parse(request.responseText);
						console.log(" request working");

						pageSwitch.innerHTML = response;
						bigImg = document.querySelector('#lightboxImg');

						if(e.currentTarget.id == 2){
							console.log("I'm 2!")
							imgContent();
						}else{
							console.log("Nope!");
						}

						function imgContent(){
							for (var i in bigImg){
								bigImg.innerHTML = '<img src=\"images/gallery/base.jpg\" alt=\"this is the base image\">';
								//bigImg.innerHTML = '<div class=\'testimonial small-12 medium-4 large-4 columns\'>'+tmnlObject[i].pic+tmnlObject[i].name+tmnlObject[i].case+tmnlObject[i].testimonial+'</div>';
							}
						}
					}else{
						console.log('There was a problem with your request.');
					}
				}
			}
			//window.addEventListener('load', function() {makeRequest('gallery.php');}, false);
	}

})();
