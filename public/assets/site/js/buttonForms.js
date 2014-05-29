$(document).on('submit', '.ajaxButtonForm1', function(e) {

	e.preventDefault();

	var data = $(this).serialize();

	var response = $.ajax({
		type: 'POST',
		url: '/perfect-home',
		data: data
	});

	response.success(function(response) {
		if (response.error)
		{
			// There was a problem... yo
		}
		else
		{
			
		}
	});

	response.fail(function(a,b,c) {

	});

});