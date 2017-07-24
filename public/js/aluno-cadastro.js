$(document).ready(function() {
	getStates();
	$('#cep').mask('99999-999')
	
	$('#state').on('change', function(event) {
		getCities($(this).val());
	});

	$('#cep').focusout(function(event) {
		cep($(this).cleanVal())
	});
	
	$('#login').focusout(function(event) {
		verifyLogin($(this).val())
	});
	
	$('#email').focusout(function(event) {
		/* Act on the event */
		verifyEmail($(this).val());
	});

	$('#ra').focusout(function(event) {
		verifyRa($(this).val())
	});

	$('#form').on('submit', function(event) {
		password = $('#password').val()
		repassword = $('#repassword').val()
		if(password != repassword){
			event.preventDefault();
			erro('Senhas não conferem', 'As duas senhas não estão batendo', $('#password'))
		}
	});
});

function getStates(){
	selected = $('#state').data('selected')
	$.ajax({
		url: '/ajax/states',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		$.each(data, function(index, val) {
			option = "<option value='"+val.id+"'>"+val.abbr+"</option>"
			if(selected == val.id){
				option = "<option value='"+val.id+"' selected>"+val.abbr+"</option>"
			}
			$('#state').append(option)
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		if (selected != "") {
			getCities(selected);
		}
	});

}

function getCities(STATE){
	$.ajax({
		url: '/ajax/cities',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val(), state: STATE},
	})
	.done(function(response) {
		$('#city option').remove()
		selected = $('#city').data('selected')
		$.each(response, function(index, val) {
			option = "<option value='"+val.id+"'>"+val.name+"</option>"
			if(selected == val.id){
				option = "<option value='"+val.id+"' selected>"+val.name+"</option>"
			}
			$('#city').append(option)
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function cep(CEP){
	$.get('http://api.postmon.com.br/v1/cep/'+CEP, function(data) {
		$('#street').val(data.logradouro)
		$('#neighborhood').val(data.bairro)
		$('#state').val(data.estado_info.codigo_ibge)
		$('#city').data('selected', data.cidade_info.codigo_ibge)
		getCities(data.estado_info.codigo_ibge)
		$('#number').focus();
	});
}

function verifyLogin(LOGIN){
	if(LOGIN == $.trim(''))
		return;
	if(LOGIN == $('#login').data('selected'))
		return;
	$.ajax({
		url: '/ajax/verificaLogin',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val(), login: LOGIN},
	})
	.done(function(response) {
		if(response['status'] != 'OK' && response['status'] == 'ERROR')
			erro('Verificar Email', 'Erro inesperado ao verificar o Login', $('#login'))
		if(response['status'] == 'ERROR')
			erro('Verificar Email', response['message'], $('#login'))	
	})
	.fail(function() {
		erro('Verificar Login', 'Erro inesperado ao verificar o login', $('#login'))
	})
	.always(function() {
		console.log("complete");
	});
	
}

function verifyEmail(EMAIL){
	if(EMAIL == $.trim(''))
		return;

	if(EMAIL == $('#email').data('selected'))
		return;
	$.ajax({
		url: '/ajax/verificaEmail',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val(), email: EMAIL},
	})
	.done(function(response) {
		if(response['status'] != 'OK' && response['status'] == 'ERROR')
			erro('Verificar Email', 'Erro inesperado ao verificar o email', $('#email'))
		if(response['status'] == 'ERROR')
			erro('Verificar Email', response['message'], $('#email'))	
	})
	.fail(function() {
		erro('Verificar Email', 'Erro inesperado ao verificar o email', $('#email'))
	})
	.always(function() {
		console.log("complete");
	});
	
}

function verifyRa(RA){
	if(RA == $.trim(''))
		return;

	if(RA == $('#ra').data('selected'))
		return;
	$.ajax({
		url: '/ajax/verificaRa',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val(), ra: RA},
	})
	.done(function(response) {
		if(response['status'] != 'OK' && response['status'] == 'ERROR')
			erro('Verificar R.A', 'Erro inesperado ao verificar o ra', $('#ra'))
		if(response['status'] == 'ERROR')
			erro('Verificar R.A', response['message'], $('#ra'))	
	})
	.fail(function() {
		erro('Verificar R.A', 'Erro inesperado ao verificar o ra', $('#ra'))
	})
	.always(function() {
		console.log("complete");
	});
}

function erro(NOME, MENSAGEM, ELEMENTO){
	$('#erroTitle').html(NOME)
	$('#erroMsg').html(MENSAGEM)
	$('#modalError').modal('show')
	$('#modalError').on('hidden.bs.modal', function(event) {
		ELEMENTO.focus();
	});
}