(function(){

	var httpRequest,
	photoThumb = document.querySelectorAll('.galThumb'),
	lightbox = document.querySelector('#galLightbox'),
	nextbutton = document.querySelector('#galnext'),
	prevbutton = document.querySelector('#galprev'),
	ctrlbuttons = document.querySelectorAll('.ctrl-btn'),
	bigPhoto = document.querySelector('#lightboxImg img'),
	bigCreds = document.querySelector('#lphotoCreds'),
	bigDesc = document.querySelector('#lphotoDesc'),
	exitbutton = document.querySelector('#lightboxExit p'),
	i;

//ON-LOAD
	lightbox.classList.add('hide');
	
	function lightboxHeight(){
		var conHeight = lightbox.offsetHeight;
		var windowHeight = window.innerHeight;
		var height = lightbox.offsetTop;
			if(windowHeight>conHeight){
				lightbox.style.height = windowHeight + "px";			
			}
	}

//CHANGE TO NEXT PHOTO WITH CONTROL BUTTONS
	for(i=0; i<ctrlbuttons.length; i++){
		ctrlbuttons[i].addEventListener('click', nextPhoto, false);

		function nextPhoto(e){
			var n = bigPhoto.id.slice(5);
			if(e.currentTarget.id == "galprev"){
				if (n==photoThumb[0].id){
					n=photoThumb.length+1;
				}
				bigPhoto.id = "photo"+(Number.parseInt(n,[10])-1);
				makeRequest();
			} 
			if(e.currentTarget.id == "galnext"){
				if (n==photoThumb.length){
					n=0;
				}
				bigPhoto.id = "photo"+(Number.parseInt(n,[10])+1);
				makeRequest();
			}

			function makeRequest(url,e){
				httpRequest = new XMLHttpRequest();
				console.log('triggered');

				if(!httpRequest){ // Checking to make sure the browser isn't too old	
					alert('Sorry, your browser is too old to access this content.');
					return false; // This exits out of a function, will execute the next line after function is closed
				}

				var m = bigPhoto.id.slice(5);
				httpRequest.onreadystatechange = switchPhoto;				
				httpRequest.open('GET', 'admin/phpscripts/galleryJSON.php?gallery_image='+m); //Passing in a url through a get protocol
				httpRequest.send();
			}

			function switchPhoto(url,e){
				if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
					var picData = JSON.parse(httpRequest.responseText);

					bigPhoto.src = "images/gallery/"+picData.gallery_name;				
					bigCreds.innerHTML = picData.gallery_att;
					bigDesc.innerHTML = picData.gallery_desc;
				}
			lightbox.classList.remove('hide');
			}
		}
	}

//OPEN NEW PHOTO IN LIGHTBOX
	for(i=0; i<photoThumb.length; i++){
		photoThumb[i].addEventListener('click', makeRequest, false);
		
		function makeRequest(url,e){
			httpRequest = new XMLHttpRequest();

			if(!httpRequest){ // Checking to make sure the browser isn't too old	
				alert('Sorry, your browser is too old to access this content.');
				return false; // This exits out of a function, will execute the next line after function is closed
			}

			bigPhoto.id = 'photo'+this.id;
			//console.log(bigPhoto.id);

			httpRequest.onreadystatechange = switchPhoto;				
			httpRequest.open('GET', 'admin/phpscripts/galleryAJAX.php?gallery_image='+this.id); //Passing in a url through a get protocol
			httpRequest.send();
		}

		function switchPhoto(url,e){
			if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
				var picData = JSON.parse(httpRequest.responseText);

				bigPhoto.src = "images/gallery/"+picData.gallery_name;				
				bigCreds.innerHTML = picData.gallery_att;
				bigDesc.innerHTML = picData.gallery_desc;
			}
		lightbox.classList.remove('hide');
		}

	}

//EXIT THE LIGHTBOX
	function exitPhoto(e){
		console.log(photoThumb.length);
		lightbox.classList.add('hide');
	}

	exitbutton.addEventListener('click', exitPhoto, false);
	window.addEventListener('load', lightboxHeight, false);

})();
