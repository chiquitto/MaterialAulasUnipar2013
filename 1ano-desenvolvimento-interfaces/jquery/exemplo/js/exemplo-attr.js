$(document).ready(function(){

	$('section').each(funcaoParaImagens);
	
});

function funcaoParaImagens(indice, elemento) {
	console.log(indice);
	console.log($(elemento).attr('src'));
}