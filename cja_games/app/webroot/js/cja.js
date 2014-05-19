function cargar(evt){	 
	 var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
      // Only process image files
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
           document.getElementById('img').src=e.target.result;
            document.getElementById('img').className ="thumb";
        };
      })(f);
      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
    document.getElementById('vacio').style.visibility="visible";
         console.log(evt);
	}

  function price(evt,price){
     document.getElementById('priceP').innerHTML='$'+evt.target.value*price;
     document.getElementById('priceP1').innerHTML='$'+evt.target.value*price;
  }
