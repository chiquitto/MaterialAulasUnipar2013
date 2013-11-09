$(document).ready(function(){

	$('img').load(imagemLoad);

	$('img').click(function() {
		window.alert('Clicou na imagem ' + $(this).attr('src'));
	});

});

function imagemLoad() {
	var imagem = $(this);
	console.log('Carregou a imagem ' + imagem.attr('src'));
}
