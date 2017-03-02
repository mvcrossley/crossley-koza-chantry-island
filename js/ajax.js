(function(){

	var httpRequest,
	photoThumb = document.querySelectorAll('.galThumb'),
	lightbox = document.querySelector('#galLightbox'),
	nextbutton = document.querySelector('#galnext'),
	prevbutton = document.querySelector('#galprev'),
	bigPhoto = document.querySelector('#lightboxImg img'),
	bigCreds = document.querySelector('#lphotoCreds'),
	bigDesc = document.querySelector('#lphotoDesc'),
	exitbutton = document.querySelector('#lightboxExit p'),
	i;

	
//CHANGE TO NEXT PHOTO
	function nextPhoto(e){
		//console.log(photoThumb.length);
		var n = bigPhoto.id.slice(5,10);
		var newID = "photo"+(Number.parseInt(n,[10])+1);
		console.log(newID);

		/*function makeRequest(url,e){
			httpRequest = new XMLHttpRequest();

			if(!httpRequest){ // Checking to make sure the browser isn't too old	
				alert('Sorry, your browser is too old to access this content.');
				return false; // This exits out of a function, will execute the next line after function is closed
			}

			
			console.log(bigPhoto.id);

			httpRequest.onreadystatechange = switchPhoto;				
			httpRequest.open('POST', 'admin/phpscripts/galleryAJAX.php?gallery_image='+this.id); //Passing in a url through a get protocol
			httpRequest.send();
		}

		function switchPhoto(url,e){
			if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
				var picData = JSON.parse(httpRequest.responseText);
				console.log(url);

				bigPhoto.src = "images/gallery/"+picData.gallery_name;
				
				bigCreds.innerHTML = picData.gallery_att;
				bigDesc.innerHTML = picData.gallery_desc;
			}
		lightbox.classList.remove('hide');
		}*/

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
			console.log(bigPhoto.id);

			httpRequest.onreadystatechange = switchPhoto;				
			httpRequest.open('POST', 'admin/phpscripts/galleryAJAX.php?gallery_image='+this.id); //Passing in a url through a get protocol
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

	nextbutton.addEventListener('click', nextPhoto, false);
	exitbutton.addEventListener('click', exitPhoto, false);

})();
