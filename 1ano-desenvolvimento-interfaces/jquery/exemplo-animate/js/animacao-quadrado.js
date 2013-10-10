$(document).ready(function(){
	//$('#quadro').css('background-color', 'red');
	//setTimeout(iniciar, 5000);

	animar();
});

var left = 0;
var csstop = 0;
var direcaoX = 1;
var direcaoY = 1;

var cor_red = 0;
var cor_green = 0;
var cor_blue = 0;

function animar() {
	trocarpos();
	trocarcor();

	setTimeout(animar, 30);
}

function trocarpos() {
	if (direcaoX == 1) {
		left = left + 20;
	}
	else {
		left = left - 20;
	}

	if (left >= 270) {
		direcaoX = 0;
	}
	if (left <= 0) {
		direcaoX = 1;	
	}

	if (direcaoY == 1) {
		csstop = csstop + 4;
	}
	else {
		csstop = csstop - 4;
	}

	if (csstop >= 270) {
		direcaoY = 0;
	}
	if (csstop <= 0) {
		direcaoY = 1;
	}

	var v = $('#dentro');
	v.css('left', left + 'px');
	v.css('top', csstop + 'px');
}

function trocarcor() {
	cor_red = cor_red + 10;
	cor_green = cor_green + 10;
	cor_blue = cor_blue + 10;

	var v = $('#dentro');

	//v.css('background-color', 'rgb(' + cor_red + ', ' + cor_green + ', ' + cor_blue + ')');
}
