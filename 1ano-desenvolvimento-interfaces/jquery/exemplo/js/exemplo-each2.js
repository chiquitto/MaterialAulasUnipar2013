$(document).ready(function(){

	$('section').each(nomeDaFuncao);
	
});

function nomeDaFuncao(indice, elemento) {
	console.log(indice);
	console.log(elemento.id);
}
