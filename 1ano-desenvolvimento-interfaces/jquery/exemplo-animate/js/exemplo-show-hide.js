$(document).ready(function(){
	$('img').click(clickMouse);
});

function clickMouse() {
	$(this)
	.parent()
	.find('h1')
	.hide(5000, function() {
		window.alert('Acabou a animacao');
	})
	.show(5000)
	;
}
