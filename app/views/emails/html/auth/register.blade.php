<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Account Registration - Leading Edge Realty</title>
	<style type="text/css">
		h1, h2, h3, h4, h5, h6 {color: rgb(164,42,31) !important;}
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: rgb(164,42,31) !important; text-decoration: underline;}
	</style>
</head>
<body>
	<div>
		<img src="<?php echo $message->embed('assets/site/img/mainlogo.png'); ?>">
	</div>
	<div>
		<h3>Thanks {{ $user->getFullName() }} for Signing Up with Leading Edge Realty</h3>

		Please copy and paste the following link in your browser to confirm your sign up:

		<a href="{{ $user->getConfirmationUrl() }}">Click here to confirm!</a><br>
		<br>
		{{$user->getConfirmationUrl()}}
	</div>
</body>
</html>