$(document).ready(function(){
	iniciar();
});

var carroImg = 2;
var qtdCarros = 3;
var carros = [];
var carrosElementos = [];

// <div><img src="img/img5.png"></div>

function iniciar() {
	prepararTelaCorrida();
}

function prepararTelaCorrida() {
	var html = '';
	for (i = 0; i < qtdCarros; i++) {
		carros[i] = 0;
		
		html += '<div><img id="carro' + i + '" src="img/img' + mt_rand(1,8) + '.png"></div>';
	}
	
	$('#jogo').html(html);
	
	for (i = 0; i < qtdCarros; i++) {
		carrosElementos[i] = $('#carro' + i);
	}

	// Depois que a tela esta OK, entao preparar eventos
	prepararEventosCorrida();
}

function prepararEventosCorrida() {
	$('#iniciarJogo').click(iniciarCorrida);
}

var jogoExecucao = false;
function iniciarCorrida() {
	if (jogoExecucao == false) {
		jogoExecucao = true;
		proximoQuadroCorrida();
	}
}

function proximoQuadroCorrida() {
	for (i = 0; i < qtdCarros; i++) {
		carros[i] += calcularPasso(i);
		carrosElementos[i].css('margin-left', carros[i]);
	}
	
	testarFim();
	
	if (jogoExecucao == true) {
		setTimeout(proximoQuadroCorrida, 50);
	}
}

function testarFim() {
	for (i = 0; i < qtdCarros; i++) {
		if ( carros[i] > 420 ) {
			alert('O carro ' + (i+1) + ' chegou no final');
			jogoExecucao = false;
		}
	}
}

function calcularPasso(i) {
	if (carros[i] < 100) {
		return mt_rand(1,3);
	}
	else if (carros[i] < 200) {
		return mt_rand(2,5);
	}
	else if (carros[i] < 300) {
		return mt_rand(3,6);
	}
	else {
		return mt_rand(4,8);
	}
}




