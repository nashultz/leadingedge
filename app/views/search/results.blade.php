@extends('layouts.sitedefault')

@section('content')	
@if (Session::has('notification'))
{{ Session::get('notification') }}
@endif

@if (Auth::check())

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="login-form">
					<div class="col-md-6 col-lg-6">

						{{ Form::open(array('method'=>'POST', 'route'=>'post.search.save')) }}

						{{ Form::label('name', 'Saved Search Name: ') }}
						{{ Form::text('name') }}

						{{ Form::submit('Save Search') }}

						{{ Form::close() }}

					</div>
					<div class="col-md-6 col-lg-6 pull-right">

						{{ Form::open(array('method'=>'POST', 'route'=>'post.search.load', 'class'=>'pull-right')) }}

						{{ Form::select('search', Auth::User()->getSearches()) }}

						{{ Form::submit('Load Saved Search') }}

						{{ Form::close() }}

					</div>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
	</div>
</div><div class="spacer-30"></div>

@endif

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				@foreach($builderResults as $builder)
				<div class="login-form">
					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>Name:</b> {{ $builder->getName() }}
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>Neighborhood:</b> {{ $builder->getNeighborhoodName() }}
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>Minimum Price:</b> {{ $builder->getMinPrice() }}
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>City:</b> {{ $builder->getNeighborhoodCity() }}
						</div>
					</div>
					<div class="clearfix"></div>					
				</div>
				<div class="spacer-10"></div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@stop