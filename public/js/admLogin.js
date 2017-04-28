$(document).ready(function() {
	$('#formLogin').submit(function(event){
		$('#btnEnviar').prop('disabled', true);
		var usuario = $('#user').val();
		var senha = $('#password').val();
		loga(usuario, senha)
		event.preventDefault();
	});
});
function loga($LOGIN, $SENHA){
	var data_form ={
		'login' : $LOGIN,
		'password': $SENHA,
		'_token': $('#token').val()
	}
	$.ajax({
		url: '/admin/login',
		type: 'POST',
		dataType: 'json',
		data: data_form,
	})
	.done(function(response) {
		if(response['status'] == 'OK'){
			window.location.href = "/admin";
		}
		else if(response['status'] == 'ERROR'){
			$('.alert-group').html('');
			var alerta = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Atenção:</strong> <span class=\"alert-msg\"></span></div>";
			$('.alert-group').html(alerta);

			if(response['error_cod'] == 1){
				$('.alert-msg').html('Login ou senha incorreto');
			}
			if(response['error_cod'] == 2){
				$('.alert-msg').html('Esse usuário não tem permissão para entrar aqui');
			}
			if(response['error_cod'] == 3){
				$('.alert-msg').html('Contrato expirado, entre em contato conosco para renovar o contrato');
			}
		}else{
			var alerta = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Atenção:</strong> Erro inesperado, tente novamente mais tarde</div>";
			$('.alert-group').html(alerta);
		}
	})
	.fail(function(response) {
		var alerta = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Atenção:</strong> Erro de conexão</div>";
		$('.alert-group').html(alerta);
	})
	.always(function() {
		$('#btnEnviar').prop('disabled', false);
		console.log("complete");
	});
	
}