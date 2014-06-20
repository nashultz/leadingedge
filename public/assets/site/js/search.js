$(document).on('click', '.save_search', function(e) {
	e.preventDefault();

	var response = $.ajax({
		type: 'POST',
		url: '/search/save',
		data: { name: $('#search_name').val() }
	});

	response.success(function(resp) {
		location.reload();
	});
});

$(document).on('click', '.load_search', function(e) {

	e.preventDefault();

	var response = $.ajax({
		type: 'POST',
		url: '/search/load',
		data: { id: $('#saved_searches').val() }
	});

	response.success(function(resp) {
		window.location = resp.url;
	});

});

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