$(document).ready(function(){

	$('section').click(function(){
		console.log('click');
	});
	
	$('section').dblclick(function(){
		console.log('click duplo');
	});
	
	$(window).resize(function(){
		//window.alert('Alterou o tamanho da tela');
	});
	
});