@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-6 col-lg-6">
		{{
			Form::open(array(
				'method'=>'POST',
				'route'=>'site.contact.send'
			))
		}}
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Contact Form</h3>
			</div>
			<div class="col-md-12 col-lg-12">
				@if (Session::has('notification'))
					{{ Session::get('notification') }}	
				@endif
				@if ($errors->has())
					@foreach($errors->all() as $message) 
						{{ $message }}
					@endforeach
				@endif

				{{ Form::token() }}
			</div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('fullname','Full Name:',array('class'=>'ralign')) }}<br>
				{{ Form::text('fullname') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('email','Email:',array('class'=>'ralign')) }}<br>
				{{ Form::text('email') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('msubject','Subject:',array('class'=>'ralign')) }}<br>
				{{ Form::text('msubject') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('mcontent','Message:',array('class'=>'ralign')) }}<br>
				{{ Form::textarea('mcontent') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				<label for="spanswer" class="ralign">What is {{$spranone}} + {{$sprantwo}}</label><br>
				{{ Form::text('spanswer') }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<input name="sum" type="hidden" id="sum" class="hvalue" value="{{$sum}}">
				{{ Form::submit('Login',array('class'=>'btn btn-success')) }}
			</div>
			<div class="clearfix"></div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop