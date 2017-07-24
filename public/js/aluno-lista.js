$(document).ready(function() {
	var ids = []
	$('#chkall').click(function(){
		$('tbody>tr').each(function(index, el) {
			var chck = $(el).children().children()
			if($('#chkall').is(':checked')){
				if(!chck.is(':checked')){
					chck.prop('checked', true);
				}
			}else{
				if(chck.is(':checked')){
					chck.prop('checked', false);
				}
			}
		});
	});

	$('#btn-delete').click(function(e) {
		$('tbody>tr').each(function(index, el) {
			var chck = $(el).children().children()
			if(chck.is(':checked')){
				ids.push(chck.val())
			}
		});
		$('#delete-ids').val(ids)
		if($('#delete-ids').val() != ""){
			$('#delete-form').submit();
		}
	});
});