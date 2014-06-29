<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contact Us Form Submission - Leading Edge Realty</title>
	<style type="text/css">

		h1, h2, h3, h4, h5, h6 {color: rgb(164,42,31) !important;}

		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: rgb(164,42,31) !important; text-decoration: underline;}

		h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
			color: red !important; 
		}

		h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
			color: purple !important; 
		}

		a {color: rgb(164,42,31);}
		
	</style>
</head>
<body>
	<div>
		<img src="<?php echo $message->embed('assets/site/img/mainlogo.png'); ?>">
	</div>
	<div>
		<h3>Contact Us Form Submission</h3>
		<p><strong>Name:</strong><br>{{$inputs['fullname']}}</p>
		<p><strong>Email:</strong><br>{{$inputs['email']}}</p>
		<p><strong>Subject:</strong><br>{{$inputs['msubject']}}</p>
		<p><strong>Message:</strong><br>{{$inputs['mcontent']}}</p>
	</div>
</body>
</html>