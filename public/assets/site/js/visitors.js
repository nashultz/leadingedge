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
	                width:          '870px', 
	                top:            '15%', 
	                left:           '20%', 
	                textAlign:      'center', 
	                color:          '#fff', 
	                border:         'none', 
	                backgroundColor:'#000', 
	                cursor:         'wait' 
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