
$(document).on('change', '#search select', function(e) {

	e.preventDefault();

	var form = $('#search');

	var data = form.serialize();

	var response = $.ajax({
		type: 'GET',
		url: 'search/results?' + data
	});

	response.success(function(resp) {

		doMap(resp);

		$('#guestAlertWindow').show();

	});

});