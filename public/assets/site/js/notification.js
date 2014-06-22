$(document).on('submit', '.ajaxForm', function(e) {
 
    e.preventDefault();
 
    ajaxForm = $(this);
 
    var ajaxStatus = $.ajax({
        type: ajaxForm.attr('method'),
        url: ajaxForm.attr('action'),
        data: ajaxForm.serialize()
    });
 
    ajaxStatus.success(function(response) {
        
        $.growlUI('check','Success!', response.message);
 
        if (typeof response.redirectUrl !== 'undefined')
        {
            setTimeout(function() {
                window.location = response.redirectUrl;
            }, 2500);
        }
    });
 
    ajaxStatus.fail(function(response) {
        response = response.responseJSON;
 
        if (typeof response.field !== 'undefined')
        {
            ajaxForm.find('div').removeClass('has-error');
 
            $.each(response.field, function(index, el) {
                $('#' + response.field[index]).parent().addClass('has-error');
            });
 
            $.growlUI('times','Error!', 'Please correct errors.');
        }
        else
        {
            ajaxForm.find('div').removeClass('has-error');
            $.growlUI('times','Error', response.message);
        }

        if (typeof response.redirectUrl !== 'undefined')
        {
            setTimeout(function() {
                window.location = response.redirectUrl;
            }, 2500);
        }
 
    });
 
});