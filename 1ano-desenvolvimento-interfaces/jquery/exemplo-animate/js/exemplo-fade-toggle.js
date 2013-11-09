$(document).ready(function(){
	//$('#img12').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$('img').fadeToggle(1000);
}
