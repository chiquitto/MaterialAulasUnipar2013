$(document).ready(function(){
	$('#img12').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$('img').slideToggle(2000);
}
