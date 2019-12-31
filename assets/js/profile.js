// Get Modal
var modal = document.getElementById('modalCard');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImage");
var modalImg = document.getElementById("imgGuru");
var captionText = document.getElementById("caption");

img.onclick = function() {
	modal.style.display = "block";
	modalImg.src = this.src;
	captionText.innerHTML = this.alt;
}

window.onclick = function(){
	if (event.target == modal) {
		modal.style.display = "none";
	}
}