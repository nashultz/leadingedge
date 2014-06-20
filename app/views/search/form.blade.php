	
{{ Form::open(array('method'=>'GET','route'=>'get.search.results', 'id'=>'search')) }}
<div class="search-form">
	<div class="col-md-12 col-lg-12">
		<h4 class="section-title">Search New Communities</h4>
	</div>
	<div class="col-md-12 col-lg-12">
		@if (Auth::guest())
			<a href="{{ URL::route('get.auth.login') }}">Login or Register</a> to Save Your Searches!
		@else
			{{ Form::label('saved_search', 'Saved Searches: ') }}
			{{ Form::select('saved_search', $savedSearches, 0, array('class'=>'form-control', 'id'=>'saved_search')) }}

			<div class="submit-container">
				<a href="#" class="delete_search btn btn-danger">Delete Saved Search</a>
			</div>

			<div class="submit-container">
				<a href="#" class="load_search btn btn-success">Load Saved Search</a>
			</div>

			{{ Form::label('search_name', 'Name: ') }}
			{{ Form::text('search_name', '', array('class'=>'form-control', 'id'=>'search_name')) }}

			<div class="submit-container">
				<a href="#" class="save_search btn btn-success">Save Search</a>
			</div>
		@endif
	</div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('city','City: ') }}<br>
		{{ Form::select('city', $searchCities, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('isd', 'School District: ') }}<br>
		{{ Form::select('isd', $searchIsds, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('neighborhood', 'Neighborhood') }}<br>
		{{ Form::select('neighborhood', $neighborhoods, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('builder', 'Builders: ') }}<br>
		{{ Form::select('builder', $builders, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('min_price', 'Minimum Cost: ') }}<br>
		{{ Form::select('min_price', $costOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('max_price', 'Maximum Cost: ') }}<br>
		{{ Form::select('max_price', $costOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('min_price', 'Minimum Sq Ft: ') }}<br>
		{{ Form::select('min_sqft', $sqFootageOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('max_price', 'Maximum Sq Ft: ') }}<br>
		{{ Form::select('max_sqft', $sqFootageOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-15"></div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-md-8 col-lg-8">
		<div class="submit-container">
			{{ Form::submit('View Printable Results',array('class'=>'btn btn-danger')) }}
		</div>
	</div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="spacer-10"></div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-md-8 col-lg-8">
		<div class="submit-container">
			<a href="{{URL::to('idx')}}" class="resale btn btn-danger">Search Resale Homes</a>
		</div>
	</div>
	<div class="col-md-2 col-lg-2"></div>	
	<div class="clearfix"></div>
</div>

{{ Form::close() }}