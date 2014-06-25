@extends('layouts.sitedefault')

@section('content')	
@if (Session::has('notification'))
{{ Session::get('notification') }}
@endif



<div id="content">
	<div class="container">
		<div class="row">
			@if (Auth::check())
			<div class="col-md-4 col-lg-4 print-hide">
				<div class="login-form">
					<div class="col-md-12 col-lg-12">
						@if (Auth::guest())
							<a href="{{ URL::route('get.auth.login') }}">Login or Register</a> to Save Your Searches!
						@else
							{{ Form::label('saved_search', 'Saved Searches: ') }}
							{{ Form::select('saved_search', $savedSearches, 0, array('class'=>'form-control', 'id'=>'saved_search')) }}
							<div class="spacer-5"></div>
							<div class="submit-container">
								<a href="#" class="delete_search btn btn-danger">Delete Saved Search</a>
							&nbsp;&nbsp;
								<a href="#" class="load_search btn btn-success">Load Saved Search</a>
							</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12 col-lg-12">

							{{ Form::label('search_name', 'Name: ') }}
							{{ Form::text('search_name', '', array('class'=>'form-control', 'id'=>'search_name')) }}
							<div class="spacer-5"></div>
							<div class="submit-container">
								<a href="#" class="save_search btn btn-success">Save Search</a>
							</div>
						@endif
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endif
			<div class="hidden-md hidden-lg space-30 print-show"></div>
			<div class="col-md-8 col-lg-8">
				@foreach($builderResults as $builder)
				<div class="login-form">
					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<h2>{{ $builder->getNeighborhoodName() }}</h2>
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>Price Range:</b> {{ $builder->getMinPrice() }} - {{ $builder->getMaxPrice() }}
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<b>Square Footage:</b> {{ $builder->getMinSqFootage() }} - {{ $builder->getMaxSqFootage() }}
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
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@stop