$(document).ready(function() {
	var clickMaterias = false;
	getStates();
	$('#state').on('change', function(event) {
		/* Act on the event */
		$('#city option').remove();
		getCities($(this).val());
	});
	$('#tabMaterias').click(function(event) {
		/* Act on the event */
		if(!clickMaterias){
			getProfessores($('.teacher'));
			clickMaterias=true;
		}
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
function getProfessores(SELECT){
	var teachers;
	$.ajax({
		url: '/ajax/teachers',
		type: 'POST',
		dataType: 'json',
		data: {_token: $('#token').val()},
	})
	.done(function(response) {
		var selected = SELECT.data('selected');
		$.each(response, function(index, teacher) {
			var option = "<option value="+teacher.id+">"+teacher.name+"</option>";
			if (teacher.id == selected){
				var option = "<option value="+teacher.id+" selected >"+teacher.name+"</option>";
			}
			SELECT.append(option)
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete - teacher");
	});
}