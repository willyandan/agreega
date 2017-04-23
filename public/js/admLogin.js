$(document).ready(function() {
	$('#formLogin').on('submit', function(event) {
		event.preventDefault();
		var token = $('#token').val();
		var escola = $('#escola').val();
		var usuario = $('#user').val();
		var senha = $('#password').val();
		loga(token, escola, usuario, senha)
	});
});
function loga($TOKEN, $ESCOLA, $LOGIN, $SENHA){
	var data_form ={
		escola : $ESCOLA,
		login : $LOGIN,
		password: $SENHA,
		_token: $TOKEN
	}
	$.ajax({
		url: '/admin/login',
		type: 'POST',
		dataType: 'json',
		data: data_form
	})
	.done(function(response) {
		console.log(JSON.stringify(response))
		console.log("success");
	})
	.fail(function(response) {
		$('body').html(JSON.stringify(response))
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}