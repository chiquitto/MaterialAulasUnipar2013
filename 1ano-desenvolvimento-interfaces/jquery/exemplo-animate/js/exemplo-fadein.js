$(document).ready(function(){
	$('img').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$('img').fadeIn(1000, function() {
		$('img').fadeOut(1000);
	});
}