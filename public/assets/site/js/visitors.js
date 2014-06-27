$(document).ready(function() {

	var request = $.ajax({

		type: 'POST',
		url: '/visitor/check'

	});

	request.success(function(response) {

		if (response.first)
		{
			$.blockUI({ 
	            message: $('#youtubevid2'),
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
                  'overflow-x':       'scroll',
                  'overflow-y': 'scroll', 
              }, 
	            onOverlayClick: $.unblockUI,
	            onBlock: function()
	            {
	            	$('#youtubevid2').html(response.video);
	            }
	        });
	    } 

	});

});