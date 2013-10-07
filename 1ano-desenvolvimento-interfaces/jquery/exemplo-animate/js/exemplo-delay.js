$(document).ready(function(){
	//$('img').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$('img')
	.delay(2000)
	.fadeToggle(2000)
	.delay(2000)
	.slideToggle(2000)
	;
}