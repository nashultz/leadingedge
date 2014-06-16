// Change to ButtonForms.js

$(document).on('submit', '.ajaxButtonForm', function(e) {

	e.preventDefault();

	var form = $(this);

	var errorDiv = form.find('.buttonerror');

	errorDiv.hide();

	var errorDivAlert = errorDiv.find('.alert');

	form.find('#movedate').removeAttr('disabled');

	var data = $(this).serialize();

	form.find('#movedate').attr('disabled','disabled');

	console.log(data);

	var response = $.ajax({
		type: 'POST',
		url: form.attr('action'),
		data: data
	});

	response.success(function(response) {

		$('html, body').animate({
			scrollTop: form.offset().top - 100
		}, 500);

		if (response.error)
		{
			errorDivAlert.removeClass().addClass('alert alert-danger').html(response.errorMsg);
			errorDiv.show();
		}
		else
		{
			errorDivAlert.removeClass().addClass('alert alert-success').html(response.message);
			errorDiv.show();
		}
	});

});

