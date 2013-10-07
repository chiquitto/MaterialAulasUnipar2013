$(document).ready(function(){
	//$('img').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$('img').slideToggle(2000);
}