$(document).ready(function(){
	$('img').click(clickMouse);
});

function clickMouse() {
	$(this)
	.parent()
	.find('h1')
	.hide(500, function() {
		window.alert('Acabou a animacao');
	});
}