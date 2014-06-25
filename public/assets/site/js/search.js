$(document).on('click', '.save_search', function(e) {
	e.preventDefault();

	var response = $.ajax({
		type: 'POST',
		url: '/search/save',
		data: { name: $('#search_name').val() }
	});

	response.success(function(resp) {
		window.location = resp.url;
	});
});

$(document).on('click', '.load_search', function(e) {

	e.preventDefault();

	var response = $.ajax({
		type: 'POST',
		url: '/search/load',
		data: { id: $('#saved_search').val() }
	});

	response.success(function(resp) {
		window.location = resp.url;
	});

});

$(document).on('click', '.delete_search', function(e) {

	e.preventDefault();

	var response = $.ajax({
		type: 'DELETE',
		url: '/search/delete',
		data: { id: $('#saved_search').val() }
	});

	response.success(function(resp) {
		window.location = resp.url;
	});

});

$(document).on('click', '.resale', function(e) {

	e.preventDefault();

	var form = $(this).parent().parent().parent().parent();

	var response = $.ajax({
		type: form.attr('method'),
		url: form.attr('action'),
		data: form.serialize()
	});
});

$(document).on('change', '#search select', function(e) {

	e.preventDefault();

	var form = $('#search');

	var data = form.serialize();

	console.log(data);

	var response = $.ajax({
		type: 'GET',
		url: 'search/results?' + data
	});

	response.success(function(resp) {

		doMap(resp);

		$('#guestAlertWindow').show();

		setTimeout(function() {
			$('#guestAlertWindow').hide();
		}, 5000);

	});

});