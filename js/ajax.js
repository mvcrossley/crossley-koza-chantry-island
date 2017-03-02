/*(function(){


	$('.galThumb').on('click', function(){
		$.getJSON('admin/phpscripts/galleryAJAX.php',{gallery_image:this.id}, function(data){
			console.log(data.gallery_name);

			$('#lightboxImg img').attr(data.gallery_name);
			//$('.hidden').removeClass('hidden');

			//$('pokemon-large').attr('src','images/'+data.pokeImage+'.png');
			//$('content-section p').text(data.pokeDesc);
			//$('habitat-header').text(data.pokeName+'lives here!');
			//$('habitat').attr('src','images/'+data.bgImage+'.png');

		});
	});

})();
*/
(function(){

	var httpRequest,
	photoThumb = document.querySelectorAll('.galThumb'),
	nextPhoto = document.querySelector('#galnext'),
	prevPhoto = document.querySelector('#galprev'),
	bigPhoto = document.querySelector('#lightboxImg img'),
	bigCreds = document.querySelector('#lphotoCreds'),
	bigDesc = document.querySelector('#lphotoDesc'),
	i;


console.log(photoThumb.length);
		function nextPhoto(e){

		}


		for(i=0; i<photoThumb.length; i++){
			
			photoThumb[i].addEventListener('click', clickedButton, false);
			photoThumb[i].addEventListener('click', makeRequest, false);


			function clickedButton(e){
				//console.log("clicked!");
				//console.log(e.currentTarget.id);
				//bigPhoto.src = "images/gallery/base3.jpg";
			}
			
			function makeRequest(url,e){
				httpRequest = new XMLHttpRequest();
				//var buttonID = url.currentTarget.id;

				if(!httpRequest){ // Checking to make sur ethe browser isn't too old	
					alert('Sorry, your browser is too old to access this content.');
					return false; // This exits out of a function, will execute the next line after function is closed
				}

				httpRequest.onreadystatechange = switchPhoto;				
				httpRequest.open('POST', 'admin/phpscripts/galleryAJAX.php?gallery_image='+this.id); //Passing in a url through a get protocol
				httpRequest.send();
				console.log(this.id);

			}

			function switchPhoto(e){

				if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){

					var picData = JSON.parse(httpRequest.responseText);

					bigPhoto.src = "images/gallery/"+picData.gallery_name;
					bigCreds.innerHTML = picData.gallery_att;
					bigDesc.innerHTML = picData.gallery_desc;



				/*}else{
					console.log('There was a problem with your request.');
					*/
				}
			}
			//window.addEventListener('load', function() {makeRequest('gallery.php');}, false);
	}

	nextPhoto.addEventListener('click', nextPhoto, false);

})();

/*			function switchPhoto(e){

				if(httpRequest.readyState === XMLHttpRequest.DONE) {
					console.log("triggered");
					if(httpRequest.status === 200) {
						
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

})();*/