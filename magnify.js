function magnify(imgID, zoom) {
  var img, mag, width, h, bw;
  img = document.getElementById(imgID);

  
  mag = document.createElement("DIV");
  mag.setAttribute("class", "img-magnifier-glass");

  
  img.parentElement.insertBefore(mag, img);

 
  mag.style.backgroundImage = "url('" + img.src + "')";
  mag.style.backgroundRepeat = "no-repeat";
  mag.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  width = mag.offsetWidth / 2;
  h = mag.offsetHeight / 2;

  
  mag.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  
  mag.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
	
    var pos, x, y;
    
    e.preventDefault();
    
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    
    if (x > img.width - (width / zoom)) {
		x = img.width - (width / zoom);
		mag.style.display = "none";
	} else if (x < width / zoom) {
		x = width / zoom;
		mag.style.display = "none";
	} else if (y > img.height - (h / zoom)) {
		y = img.height - (h / zoom);
		mag.style.display = "none";
	} else if (y < h / zoom) {
		y = h / zoom;
		mag.style.display = "none";
	} else {
		mag.style.display = "block";
	}
    
    mag.style.left = (x - width) + "px";
    mag.style.top = (y - h) + "px";
    
    mag.style.backgroundPosition = "-" + ((x * zoom) - width + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    a = img.getBoundingClientRect();
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
