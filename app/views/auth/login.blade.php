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
						<h3 class="section-title">Login</h3>
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('user', 'Username / Email') }}<br>
						{{ Form::text('user','', array('form-control')) }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('password','Password') }}<br>
						{{ Form::password('password') }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-12 col-lg-12">
						{{ Form::submit('Login',array('class'=>'btn btn-success')) }}
					</div>
					<div class="clearfix"></div>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop