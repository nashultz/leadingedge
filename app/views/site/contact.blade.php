@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<h1 class="section-title">Contact Us</h1>
	</div>
	<div class="col-md-6 col-lg-6">
		{{
			Form::open(array(
				'method'=>'POST',
				'route'=>'site.contact.send'
			))
		}}
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Online</h3>
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
				{{ Form::text('fullname','',array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('email','Email:',array('class'=>'ralign')) }}<br>
				{{ Form::text('email','',array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				{{ Form::label('msubject','Subject:',array('class'=>'ralign')) }}<br>
				{{ Form::text('msubject','',array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				{{ Form::label('mcontent','Message:',array('class'=>'ralign')) }}<br>
				{{ Form::textarea('mcontent','',array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-6 col-lg-6">
				<label for="spanswer" class="ralign">What is {{$spranone}} + {{$sprantwo}}</label><br>
				{{ Form::text('spanswer','',array('class'=>'form-control')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<input name="sum" type="hidden" id="sum" class="hvalue" value="{{$sum}}">
				{{ Form::submit('Send Message',array('class'=>'btn btn-danger')) }}
			</div>
			<div class="clearfix"></div>
		</div>
		{{ Form::close() }}
	</div>
	<div class="space-30"></div>
	<div class="col-md-6 col-lg-6">
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">By Phone</h3>
			</div>
			<div class="col-md-12 col-lg-12">
				<i class="fa fa-phone">&nbsp;&nbsp;</i> 512-751-6119<br>
				<i class="fa fa-phone">&nbsp;&nbsp;</i> 512-289-0112
			</div>
			<div class="spacer-30"></div>
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">By Email</h3>
			</div>
			<div class="col-md-12 col-lg-12">
				<i class="fa fa-envelope">&nbsp;&nbsp;</i> LeadingEdgeRealtyAustin[at]gmail.com
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@stop