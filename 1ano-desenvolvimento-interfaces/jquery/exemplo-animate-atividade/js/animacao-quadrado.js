$(document).ready(function(){
	q = $('#dentro');

	$('#btu').click(function() {
		irParaCima();
	});
	$('#btd').click(function() {
		irParaBaixo();
	});
	$('#btl').click(function() {
		irParaEsquerda();
	});
	$('#btr').click(function() {
		irParaDireita();
	});
	
	$('#img1').click(function() {
		trocarImagem(1);
	});
	$('#img2').click(function() {
		trocarImagem(2);
	});
	$('#img3').click(function() {
		trocarImagem(3);
	});
	$('#img4').click(function() {
		trocarImagem(4);
	});
	$('#img5').click(function() {
		trocarImagem(5);
	});
	
	animar();
});

var q;
var movimentoX = 0;
var movimentoY = 0;
var posLeft = 0;
var posTop = 0;
var pxPorQuadro = 5;
var maximo = 280;

function animar() {
	posLeft = posLeft + (pxPorQuadro * movimentoX);
	posTop = posTop + (pxPorQuadro * movimentoY);
	
	if (posLeft < 0) {
		posLeft = 0;
	}
	if (posLeft > maximo) {
		posLeft = maximo;
	}
	if (posTop < 0) {
		posTop = 0;
	}
	if (posTop > maximo) {
		posTop = maximo;
	}
	
	q.css('top', posTop + 'px');
	q.css('left', posLeft + 'px');
	setTimeout(animar, 50);
}
function irParaCima() {
	movimentoX = 0;
	movimentoY = -1;
}
function irParaBaixo() {
	movimentoX = 0;
	movimentoY = 1;
}
function irParaEsquerda() {
	movimentoX = -1;
	movimentoY = 0;
}
function irParaDireita() {
	movimentoX = 1;
	movimentoY = 0;
}
function trocarImagem(n) {
	var valor = 'url(img/img' + n + '.png)';
	q.css('background-image', valor);
	q.css('background-color', 'transparent');
}