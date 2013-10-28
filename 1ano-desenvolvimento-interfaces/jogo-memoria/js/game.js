$(document).ready(function(){
	j = $('#jogo');
	
	iniciar();
});

var maxPares = 12;
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
function sortearCartas() {
	for (i = 0; i < (maxPares*2); i++) {
		cartasPosicao[i] = 0;
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
var cartaAberta = -1;
function cartaClicada() {
	var t = $(this);
	
	abrirCarta(t.attr('numero'));
	cartasAbertas++;
	
	if (cartasAbertas == 2) {
		fig1 = cartasPosicao[cartaAberta];
		fig2 = cartasPosicao[t.attr('numero')];
		
		if (fig1 == fig2) {
			// acertou o par
			console.log('Acertou');
		}
		else {
			// fechar as 2 cartas abertas
		}
	}
	else {
		cartaAberta = t.attr('numero');
	}
}

function abrirCarta(numero) {
	var img = 'url(img/img' + cartasPosicao[numero] + '.png)';
	$('#carta' + numero).css('background-image', img);
}



