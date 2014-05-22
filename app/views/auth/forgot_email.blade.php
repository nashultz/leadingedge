@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		@if (Session::has('notification'))
			{{ Session::get('notification') }}	
		@endif	

		{{ Form::open() }}
		<div class="forgot-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Forgot Email</h3>
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('username','Username: ') }}
				{{ Form::text('username') }}
			</div>
			<div class="spacer-5"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('password', 'Password: ') }}
				{{ Form::password('password') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::submit('Retrieve Email',array('class'=>'btn btn-danger')) }}
			</div>
			<div class="clearfix"></div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop