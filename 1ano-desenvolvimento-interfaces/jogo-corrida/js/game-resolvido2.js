$(document).ready(function(){
	iniciar();
});

var carroImg = 5;
var qtdCarros = 5;
var carros = [];
var carrosElementos = [];

function iniciar() {
	prepararTelaCorrida();
}

function prepararTelaCorrida() {
	var stringHtml = '';
	
	for(i = 0; i < qtdCarros; i++) {
		carros[i] = 0;
		
		stringHtml += '<div><img id="carro' + i + '" src="img/img' + mt_rand(1,8) + '.png"></div>';
	}
	
	$('#jogo').html(stringHtml);
	
	for(i = 0; i < qtdCarros; i++) {
		carrosElementos[i] = $('#carro' + i);
	}

	// Depois que a tela esta OK, entao preparar eventos
	prepararEventosCorrida();
}

function prepararEventosCorrida() {
	$('#iniciarJogo').unbind('click');
	$('#iniciarJogo').click(iniciarCorrida);
}

var jogoAndamento = false;
function iniciarCorrida() {
	console.log('iniciarCorrida');
	if (jogoAndamento == true) {
		return false;
	}
	
	jogoAndamento = true;
	proximoQuadroCorrida();
}

function proximoQuadroCorrida() {
	for(i = 0; i < qtdCarros; i++) {
		carros[i] += calcularPasso(i);
		carrosElementos[i].css('margin-left', carros[i]);
	}
	
	testarFim();
	
	if (jogoAndamento) {
		setTimeout(proximoQuadroCorrida, 50);
	}
	else {
		prepararTelaCorrida();
	}
}

function testarFim() {
	for(i = 0; i < qtdCarros; i++) {
		if (carros[i] >= 420) {
			window.alert('O carro ' + (i+1) + ' chegou no final.');
			jogoAndamento = false;
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







