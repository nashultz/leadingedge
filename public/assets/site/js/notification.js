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

        ajaxForm.reset();
    });
 
    ajaxStatus.fail(function(response) {
        response = response.responseJSON;

        console.log(response);
 
        if (typeof response.field !== 'undefined')
        {
            ajaxForm.find('div').removeClass('has-error');
 
            $.each(response.field, function(index, el) {
                $('#' + response.field[index]).parent().addClass('has-error');
            });
            $("#spanswer").val('');
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

$(document).on('submit','.scrollTop', function(e) {
    e.preventDefault();

    $('html, body').animate({
        scrollTop: $(this).offset().top - 100
    }, 500);
});

$(document).on('submit', '#contactUsForm', function(e) {
    e.preventDefault();

    var one = Math.ceil(Math.random() * 30);
    var two = Math.ceil(Math.random() * 30);

    $('#splabel').html('What is ' + one + ' + ' + two);
    $('#sum').attr('value', one+two);
});