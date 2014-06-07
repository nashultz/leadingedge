$(document).on('submit', '.ajaxButtonForm1', function(e) {

	e.preventDefault();

	var form = $('.ajaxButtonForm1');

	var data = $(this).serialize();

	var response = $.ajax({
		type: 'POST',
		url: '/perfect-home',
		data: data
	});

	response.success(function(response) {

		$('html, body').animate({
			scrollTop: form.offset().top - 100
		}, 500);

		if (response.error)
		{

		}
		else
		{
			
		}
	});

});