$(document).ready(function(){

	$('section').click(function(){
		console.log( this.id  );
		console.log( $(this).attr('id')  );
	});
	
});