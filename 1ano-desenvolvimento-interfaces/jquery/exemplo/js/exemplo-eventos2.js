$(document).ready(function(){

	$("section").click(function(e) {
		console.log(e.target);
		//window.alert('click');
	});
	
	//$('section').hover(hover1, hover2);
	
	$(window).resize(function() {
		//window.alert('Trocou o tamanho');
	});
	
	$(document).mousemove(function(e){
		//console.log(e.pageX);
	});
	
});

function hover1() {
	console.log('///////////////');
}

function hover2() {
	console.log('+++++++++++++++');
}