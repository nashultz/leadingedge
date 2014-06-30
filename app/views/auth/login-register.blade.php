@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-6 col-lg-6">
		{{ Form::open(array('method'=>'POST','route'=>'post.auth.login','class'=>'ajaxLoginForm')) }}

		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Sign In</h3>
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('user', 'Username / Email') }}<br>
				{{ Form::text('user','', array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password','Password') }}<br>
				{{ Form::password('password', array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12">
				{{Form::checkbox('remember','true')}} Remember Me
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<div class="submit-container">
				{{ Form::submit('Sign In',array('class'=>'btn btn-danger')) }}
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
	<div class="hidden-md hidden-lg space-30"></div>
	<div class="col-md-6 col-lg-6">
		{{ Form::open(array('method'=>'POST','route'=>'post.auth.register','class'=>'ajaxLoginForm')) }}

		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Sign Up for Full Access</h3>
			</div>
			<div class="col-md-12 col-lg-12">
				<div class="help-block">
					This will give you full access to search and save the new homes database. Searching resale homes is through a different database and you have to signup seperately to save searches on that search.
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('fname', 'First Name') }}<br>
				{{ Form::text('fname','', array('class'=>'form-control')) }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('lname', 'Last Name') }}<br>
				{{ Form::text('lname','', array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('username', 'Username') }}<br>
				{{ Form::text('username','', array('class'=>'form-control')) }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('email', 'Email') }}<br>
				{{ Form::text('email','', array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password', 'Password') }}<br>
				{{ Form::password('password', array('class'=>'form-control')) }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password_confirmation', 'Confirm Password') }}<br>
				{{ Form::password('password_confirmation', array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<div class="submit-container">
				{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		{{ Form::close() }}
	</div>
</div>
@stop