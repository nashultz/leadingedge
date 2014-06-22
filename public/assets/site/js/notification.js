  var buttonForm;
  var buttonFormTimeout;
  var buttonFormTimeoutSeconds = 5000;

  function startButtonFormTimer()
  {
    // Start the Timeout
      buttonFormTimeout = setTimeout(function() {
        buttonForm.slideToggle(800);
        $.growlUI('exclamation-triangle','Attention!', 'Side Form Minimized due to Inactivity');
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
                ajaxForm.find('#' + response.field[index]).parent().addClass('has-error');
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