$(document).ready(function(){
	$('#img12').hide();
	
	$('section').click(clickMouse);
});

function clickMouse() {
	$(this).find('img').toggle(500);
}
