  var buttonForm;
  var buttonFormTimeout;
  var buttonFormTimeoutSeconds = 30000;
  var growl;

  function startButtonFormTimer()
  {
    // Start the Timeout
      buttonFormTimeout = setTimeout(function() {
        buttonForm.slideToggle(800);
        $.growlUI('Attention!', 'Side Form Minimized due to Inactivity');
      }, buttonFormTimeoutSeconds);
  }

  function stopButtonFormTimer()
  {
    clearTimeout(buttonFormTimeout);
  }

  $(document).on('click', '.buttonToggle', function(e) {
      e.preventDefault(); 

      var button = $(this);
      var buttons = $('.buttonToggle');
      buttonForm = $(this).next('div');

      var formDisplayStatus = buttonForm.css('display'); // 'none' or 'Block'

      buttons.removeClass('active');    // Remove all 'active' class from ALL buttons   

      if (formDisplayStatus == 'none')
      {
        // Form is going to open
        button.addClass('active'); // Add ACTIVE class to newly opened form (it's going to toggle "down")
        startButtonFormTimer(); // Start the Form Timer
      }
      else {
        // Form is going to close
        stopButtonFormTimer(); // Form is going to close... stop the timer...
      }

        buttonForm.slideToggle(800);

      // SElect all buttons that ARE NOT active...
      $.each(buttons.not('.active'), function(index, siblingButton) {
        $(siblingButton).next('div').slideUp(800);
      });

      // Toggle (UP or DOWN) the buttonFor

  }); 

$(document).on('focusin', '.buttonForm', function(e) {
    clearTimeout(buttonFormTimeout);
});

$(document).on('focusout', '.buttonForm', function(e) {
    startButtonFormTimer();
});

$(document).on('click','#blockLogin', function(e) {
    e.preventDefault();

    $.blockUI({ 
              message: $('#loginForm'),
              css: { 
                  padding:        0, 
                  margin:         0, 
                  width:          '90%', 
                  top:            '5%', 
                  left:           '5%',
                  bottom:         '5%', 
                  color:          '#000', 
                  border:         'none', 
                  backgroundColor:'#fff', 
                  cursor:         'wait',
                  'overflow-x':       'hidden',
                  'overflow-y': 'scroll', 
              }, 
              onOverlayClick: $.unblockUI,
          });
});

$(document).on('submit', '.ajaxForm', function(e) {
 
    e.preventDefault();
 
    ajaxForm = $(this);
 
    var ajaxStatus = $.ajax({
        type: ajaxForm.attr('method'),
        url: ajaxForm.attr('action'),
        data: ajaxForm.serialize()
    });
 
    ajaxStatus.success(function(response) {
        
        $.growlUI('Success!', response.message);
 
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
                ajaxForm.find('#' + response.field[index]).parent().addClass('has-error');
            });
            $("#spanswer").val('');
            $.growlUI('Error!', 'Please correct errors.');
        }
        else
        {
            ajaxForm.find('div').removeClass('has-error');
            $.growlUI('Error', response.message);
        }

        if (typeof response.redirectUrl !== 'undefined')
        {
            setTimeout(function() {
                window.location = response.redirectUrl;
            }, 2500);
        }
 
    });
 
});

$(document).on('submit', '.ajaxLoginForm', function(e) {
 
    e.preventDefault();
 
    ajaxForm = $(this);
 
    var ajaxStatus = $.ajax({
        type: ajaxForm.attr('method'),
        url: ajaxForm.attr('action'),
        data: ajaxForm.serialize()
    });
 
    ajaxStatus.success(function(response) {
        
        $.growlUI('Success!', response.message);
 
        if (typeof response.redirectUrl !== 'undefined')
        {
            $.unblockUI;
            setTimeout(function() {
                location.reload();
            }, 100);
        }

        ajaxForm.reset();
    });
 
    ajaxStatus.fail(function(response) {
        response = response.responseJSON;

        console.log(response);
 
        if (typeof response.field !== 'undefined')
        {
            ajaxForm.find('div').removeClass('has-error');

            var messageString = '';
 
            $.each(response.field, function(index, el) {
                ajaxForm.find('#' + response.field[index]).parent().addClass('has-error');
                messageString += response.message[index] + '<br>';
            });
            $("#spanswer").val('');
            $.growlUI('Error', messageString, 3000, function() {}, '.login-register');
        }
        else
        {
            ajaxForm.find('div').removeClass('has-error');
            $.growlUI(response.field, response.message, 3000, function() {}, '.login-register');
        }

        if (typeof response.redirectUrl !== 'undefined')
        {
            setTimeout(function() {
                window.location = response.redirectUrl;
            }, 2500);
        }

        /*setTimeout(function() {
            $.blockUI({ 
                  message: $('#loginForm'),
                  css: { 
                      padding:        0, 
                      margin:         0, 
                      width:          '90%', 
                      top:            '5%', 
                      left:           '5%',
                      bottom:         '5%', 
                      color:          '#000', 
                      border:         'none', 
                      backgroundColor:'#fff', 
                      cursor:         'wait',
                      'overflow-x':       'hidden',
                      'overflow-y': 'scroll', 
                  }, 
                  onOverlayClick: $.unblockUI,
              });
        }, 1200);*/
 
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

$(document).on('submit', '#testimonialForm', function(e) {
    e.preventDefault();

    var one = Math.ceil(Math.random() * 30);
    var two = Math.ceil(Math.random() * 30);

    $('#splabel').html('What is ' + one + ' + ' + two);
    $('#sum').attr('value', one+two);
});