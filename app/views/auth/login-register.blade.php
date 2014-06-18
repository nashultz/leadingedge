@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-6 col-lg-6">
		{{ Form::open(array('method'=>'POST','route'=>'post.auth.login')) }}

		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Login</h3>
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('user', 'Username / Email') }}<br>
				{{ Form::text('user','', array('form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password','Password') }}<br>
				{{ Form::password('password') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12">
				{{Form::checkbox('remember','true')}} Remember Me
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<div class="submit-container">
				{{ Form::submit('Login',array('class'=>'btn btn-danger')) }}
				</div>
			</div>
			<div class="spacer-20"></div>
			<div class="forgot-links col-md-12 col-lg-12">
				<a href="{{URL::route('get.auth.forgot.email')}}">Forgot Email</a> | <a href="{{URL::route('get.auth.forgot.password')}}">Forgot Password</a>
			</div>
			<div class="clearfix"></div>
		</div>

		{{ Form::close() }}
	</div>
	<div class="space-30"></div>
	<div class="col-md-6 col-lg-6">
		{{ Form::open(array('method'=>'POST','route'=>'post.auth.register')) }}

		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Register an Account</h3>
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('fname', 'First Name') }}<br>
				{{ Form::text('fname') }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('lname', 'Last Name') }}<br>
				{{ Form::text('lname') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('username', 'Username') }}<br>
				{{ Form::text('username') }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('email', 'Email') }}<br>
				{{ Form::text('email') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password', 'Password') }}<br>
				{{ Form::password('password') }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password_confirmation', 'Confirm Password') }}<br>
				{{ Form::password('password_confirmation') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<div class="submit-container">
				{{ Form::submit('Register',array('class'=>'btn btn-danger')) }}
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop