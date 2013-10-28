$(document).ready(function(){
	j = $('#jogo');
	
	iniciar();
});

var maxPares = 4;
var j;

function iniciar() {
	iniciarTela();
	sortearCartas();
	prepararEventos();
}

/**
Desenhar cartas para o usuario
*/
function iniciarTela() {
	var cartas = '';
	
	for(i=0; i < (maxPares*2); i++) {
		cartas += '<div id="carta'
			+ i
			+ '" numero="'
			+ i
			+ '"></div>';
	}
	
	j.html(cartas);
}

var cartasPosicao = [];
var cartasPosicaoAcertos = [];
var paresAcertos = 0;

function sortearCartas() {
	for (i = 0; i < (maxPares*2); i++) {
		cartasPosicao[i] = 0;
		cartasPosicaoAcertos[i] = 0;
	}
	
	for (i = 1; i <= maxPares; i++) {
		imagensColocadas = 0;
		
		while(imagensColocadas < 2) {
			n = mt_rand(0, (maxPares*2-1));
			
			if (cartasPosicao[n] == 0) {
				cartasPosicao[n] = i;
				imagensColocadas++;
			}
		}
	}
	
	console.log(cartasPosicao);
}

function prepararEventos() {
	$('#jogo div').click(cartaClicada);
}

var cartasAbertas = 0;
var cartaAberta1 = -1;
var cartaAberta2 = -1;
var fecharCartas = false;

function cartaClicada() {
	var t = $(this);
	
	if (cartasPosicaoAcertos[t.attr('numero')] == 1) {
		return false;
	}
	
	cartasAbertas++;
	
	if (fecharCartas) {
		fecharCarta(cartaAberta1);
		fecharCarta(cartaAberta2);
		cartasAbertas = 1;
		fecharCartas = false;
	}
	
	abrirCarta(t.attr('numero'));
	
	if (cartasAbertas == 2) {
		cartaAberta2 = t.attr('numero');
		
		fig1 = cartasPosicao[cartaAberta1];
		fig2 = cartasPosicao[cartaAberta2];
		
		if (fig1 == fig2) {
			acertouCartas();
		}
		else {
			fecharCartas = true;
		}
	}
	else {
		cartaAberta1 = t.attr('numero');
	}
}

function abrirCarta(numero) {
	var img = 'url(img/img' + cartasPosicao[numero] + '.png)';
	$('#carta' + numero).css('background-image', img);
}

function fecharCarta(numero) {
	var img = 'url(img/img0.png)';
	$('#carta' + numero).css('background-image', img);
}

function acertouCartas() {
	cartasAbertas = 0;
	
	cartasPosicaoAcertos[cartaAberta1] = 1;
	cartasPosicaoAcertos[cartaAberta2] = 1;
	
	paresAcertos++;
	
	if (paresAcertos == maxPares) {
		window.alert('Game over');
		
		if (window.confirm('Quer jogar novamente?')) {
			iniciar();
		}
	}
}










