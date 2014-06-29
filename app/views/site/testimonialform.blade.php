@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<h1 class="section-title">Submit a Testimonial</h1>
	</div>
	<div class="col-md-6 col-lg-6">
		{{
			Form::open(array(
				'method'=>'POST',
				'route'=>'site.testimonials.send',
				'class'=>'ajaxForm',
				'id'=>'testimonialForm'
			))
		}}
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
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
				<label id="splabel" for="spanswer" class="ralign">What is {{$spranone}} + {{$sprantwo}}</label><br>
				{{ Form::text('spanswer','',array('class'=>'form-control','id'=>'spanswer')) }}
			</div>
			<div class="spacer-20"></div>
			<div class="col-md-12 col-lg-12">
				<input name="sum" type='hidden' id="sum" class="hvalue" value="{{$sum}}">
				{{ Form::submit('Send Testimonial',array('class'=>'btn btn-danger')) }}
			</div>
			<div class="clearfix"></div>
		</div>
		{{ Form::close() }}
	</div>
	<div class="clearfix"></div>
</div>
@stop