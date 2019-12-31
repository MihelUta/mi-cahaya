var modal = document.getElementById('myModal');

window.onclick = function(){
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

function myFunction(x) {
	x.classList.toggle("change");
}