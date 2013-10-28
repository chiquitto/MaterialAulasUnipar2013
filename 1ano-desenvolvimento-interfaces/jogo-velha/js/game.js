$(document).ready(function(){
	iniciar();
});

var jogadorAtual = 0;
var pecasEscolhidas = [];
var pecasEscolhidasContador = 0;

function iniciar() {
	montarTela();
	prepararEventos();

	jogadorAtual = 1;
}

function montarTela() {
	var html = '';

	for(var i = 0; i < 9; i++) {
		html += '<div id="bt' + i
		+ '" numero="' + i
		+ '"></div>';

		pecasEscolhidas[i] = 0;
	}

	$('#jogo').html(html);
}

function prepararEventos() {
	$('#jogo div').click(jogar);
}

function jogar() {
	var q = $(this);
	var n = q.attr('numero');

	if ( pecasEscolhidas[n] != 0 ) {
		return false;
	}

	pecasEscolhidas[n] = jogadorAtual;
	pecasEscolhidasContador++;

	var img = 'url(img/img' + jogadorAtual + '.png)';
	q.css('background-image', img);

	if (testarFim()) {
		window.alert('O jogador ' + jogadorAtual + ' venceu');
		iniciar();
		return false;
	}

	if (pecasEscolhidasContador == 9) {
		window.alert('2 losers jogando.');
		iniciar();
		return false;
	}

	trocarJogador();
}

function trocarJogador() {
	if (jogadorAtual == 1) {
		jogadorAtual = 2;
	}
	else {
		jogadorAtual = 1;
	}
}

function testarFim() {
	var possibilidades = [
		[0,1,2],
		[3,4,5],
		[6,7,8],
		[0,3,6],
		[1,4,7],
		[2,5,8],
		[0,4,8],
		[2,4,6]
	];

	for (var i = 0; i < 8; i++) {
		var pos1 = possibilidades[i][0];
		var pos2 = possibilidades[i][1];
		var pos3 = possibilidades[i][2];
		if (
			(pecasEscolhidas[pos1] == jogadorAtual)
			&& (pecasEscolhidas[pos2] == jogadorAtual)
			&& (pecasEscolhidas[pos3] == jogadorAtual)
		) {
			return true;
			break;
		}
	}

	return false;
}








