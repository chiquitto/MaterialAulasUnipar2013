$(document).ready(function(){

	$('img,section').each(funcaoParaImagens);
	
});

function funcaoParaImagens(indice, elemento) {
	console.log(indice);
	console.log($(this));
}
