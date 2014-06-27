	
{{ Form::open(array('method'=>'GET','route'=>'get.search.results', 'id'=>'search')) }}
<div class="search-form">
	<div class="col-md-12 col-lg-12">
		<h4 class="section-title">Search New Communities</h4>
	</div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('city','City: ') }}<br>
		{{ Form::select('city', $searchCities, 'Any',array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('isd', 'School District: ') }}<br>
		{{ Form::select('isd', $searchIsds, 'Any',array('class'=>'form-control')) }}
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
		{{ Form::label('min_sqft', 'Minimum Sq Ft: ') }}<br>
		{{ Form::select('min_sqft', $sqFootageOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('max_sqft', 'Maximum Sq Ft: ') }}<br>
		{{ Form::select('max_sqft', $sqFootageOptions, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-15"></div>
	<div class="col-md-12 col-lg-12">
		<div class="submit-container">
			{{ Form::submit('View Printable Results*',array('class'=>'btn btn-danger')) }}
		</div>
	</div>
	<div class="spacer-10"></div>
	<div class="col-md-12 col-lg-12">
		<div class="submit-container">
			<a href="#" class="resale btn btn-danger">Search Resale Homes</a>
		</div>
	</div>
	<div class="col-md-12 col-lg-12">
		<span class="help-block"><small>*Login/Register to save searches</small></span>
	</div>
	<div class="clearfix"></div>
</div>

{{ Form::close() }}