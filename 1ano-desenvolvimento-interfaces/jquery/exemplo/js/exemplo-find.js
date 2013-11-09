$(document).ready(function(){
	$('section').click(clickMouse);
});

function clickMouse() {
	var imagem = $(this).find('img');
	
	imagem.hide();
}
