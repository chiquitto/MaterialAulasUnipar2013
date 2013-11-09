$(document).ready(function(){
	$('img').click(imagemClicada);
	$('img').hover(imagemHover, imagemHover2);
});
function imagemClicada() {
	var elementoPai = $(this).parent();

	console.log(elementoPai.attr('id'));

	elementoPai.hide();
}
function imagemHover() {
	var elementoPai = $(this).parent();
	elementoPai.addClass('fundoVermelho');
}
function imagemHover2() {
	var elementoPai = $(this).parent();
	elementoPai.removeClass('fundoVermelho');
}

