$(document).ready(function() {
	var clickMaterias = false;
	arrayProfs = [];
	$('#cep').mask('99999-999')
	getStates();
	
	$('#cep').focusout(function(event) {
		/* Act on the event */
		cep($(this).val())
	});

	$('#state').on('change', function(event) {
		/* Act on the event */
		$('#city option').remove();
		getCities($(this).val());
	});

	$('#tabMaterias').click(function(event) {
		/* Act on the event */
		if(!clickMaterias){
			getProfessores()
			$('.teacher').each(function(index, el) {
				setProfessores($(this), arrayProfs);
			});
			clickMaterias=true;
		}
	});

	$('#btnMatterPlus').click(function(event) {
		/* Act on the event */
		var row = "<tr><td><div class=\"iconInput\"><i class=\"fa fa-book\"></i><input type=\"text\" id=\"matter\" name=\"matter[]\" class=\"form-control input-agreega\" placeholder=\"Matéria\"></div></td><td><select name=\"teacher[]\" class=\"form-control input-agreega teacher\"><option value=\"00\">Professor</option></select></td><td><button type=\"button\" class=\"btn btn-danger btnMatterMinus\"><i class=\"fa fa-times\"></i></button></td></tr>";
		$('#tableMatter').children().next().append(row)
		setProfessores($('.teacher').last(), arrayProfs);
	});

	$('.btnMatterMinus').click(function(event) {
		$(this).parent().parent().remove()
	});
});
function getStates(){
	$.ajax({
		url: '/ajax/states',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(response) {
		selected = $('#state').data('selected');
		$.each(response, function(index, state) {
			var option = "<option value="+state.id+">"+state.abbr+"</option>";
			if(selected == state.id){
				option = "<option value="+state.id+" selected>"+state.abbr+"</option>";
				var callCity = true;
			}
			$('#state').append(option)
			if(callCity){
				getCities(selected);
			}
		});
	})
	.fail(function(response) {
		console.log(JSON.stringify(response));
	})
	.always(function() {
		console.log("complete");
	});
}

function getCities(STATE) {
	selected = $('#city').data('selected');
	$.ajax({
		url: '/ajax/cities',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val(), state:STATE},
	})
	.done(function(response) {
		$.each(response, function(index, city) {
			var option = "<option value="+city.id+">"+city.name+"</option>";
			if (city.id == selected){
				var option = "<option value="+city.id+" selected >"+city.name+"</option>";
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

function setProfessores(SELECT, ARRAY){
	$.each(ARRAY, function(index, teacher) {
		selected = SELECT.data('selected')
		var option = "<option value="+teacher.id+">"+teacher.name+"</option>";
		if (teacher.id == selected){
			var option = "<option value="+teacher.id+" selected >"+teacher.name+"</option>";
		}
		SELECT.append(option)
	});
}

function getProfessores(){
	$.ajax({
		url: '/ajax/teachers',
		type: 'POST',
		async: false,
		dataType: 'json',
		data: {_token: $('#token').val()},
	})
	.done(function(response){
		$.each(response, function(index, teacher) {
			arrayProfs[index] = {
				id: teacher.id,
				name: teacher.name
			};
		})
	})
	.fail(function() {
		console.log("fail")
	})
	.always(function(){
		console.log("complete")
	})
}

function cep(cep) {
	$.get('http://api.postmon.com.br/v1/cep/'+cep, function(data) {
		console.log(data)
		$('#street').val(data.logradouro)
		$('#neighborhood').val(data.bairro)
		$('#state').val(data.estado_info.codigo_ibge)
		$('#city').data('selected', data.cidade_info.codigo_ibge)
		getCities(data.estado_info.codigo_ibge)
	});
}