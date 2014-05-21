@extends('layouts.sitedefault')

@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
				@if (Session::has('notification'))
					{{ Session::get('notification') }}	
				@endif	

				{{ Form::open(array('method'=>'POST')) }}

				<div class="search-form">
					<div class="col-md-12 col-lg-12">
						<h3 class="section-title">Register an Account</h3>
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('fname', 'First Name') }}<br>
						{{ Form::text('fname') }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('lname', 'Last Name') }}<br>
						{{ Form::text('lname') }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('username', 'Username') }}<br>
						{{ Form::text('username') }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('email', 'Email') }}<br>
						{{ Form::text('email') }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('password', 'Password') }}<br>
						{{ Form::password('password') }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('password_confirmation', 'Confirm Password') }}<br>
						{{ Form::password('password_confirmation') }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-12 col-lg-12">
						{{ Form::submit('Register',array('class'=>'btn btn-success')) }}
					</div>
					<div class="clearfix"></div>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop