$(document).on('submit', '.ajaxButtonForm1', function(e) {

	e.preventDefault();

	var form = $('.ajaxButtonForm1');

	var errorDiv = $('.ajaxButtonForm1 .buttonerror');

	errorDiv.hide();

	var errorDivAlert = $('.ajaxButtonForm1 .buttonerror .alert');

	$('.ajaxButtonForm1 #movedate').removeAttr('disabled');

	var data = $(this).serialize();

	$('.ajaxButtonForm1 #movedate').attr('disabled','disabled');

	console.log(data);

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


// Form 2

$(document).on('submit', '.ajaxButtonForm2', function(e) {

	e.preventDefault();

	var form = $('.ajaxButtonForm2');

	var errorDiv = $('.ajaxButtonForm2 .buttonerror');

	errorDiv.hide();

	var errorDivAlert = $('.ajaxButtonForm2 .buttonerror .alert');

	$('.ajaxButtonForm2 #movedate').removeAttr('disabled');

	var data = $(this).serialize();

	$('.ajaxButtonForm2 #movedate').attr('disabled','disabled');

	console.log(data);

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