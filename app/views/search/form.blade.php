	
{{ Form::open(array('method'=>'GET','route'=>'get.search.results', 'id'=>'search')) }}
<div class="search-form">
	<div class="col-md-12 col-lg-12">
		<h4 class="section-title">Search New Communities</h4>
	</div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('city','City: ') }}<br>
		{{ Form::select('city', $cities, 0,array('class'=>'form-control')) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('isd', 'School District: ') }}<br>
		{{ Form::select('isd', $isds, 0,array('class'=>'form-control')) }}
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
	<!--
	<div class="col-md-6 col-lg-6">
		{{ Form::label('min_price', 'Minimum Cost: ') }}<br>
		{{ Form::select('min_price', $costOptions, 0) }}
	</div>
	<div class="col-md-6 col-lg-6">
		{{ Form::label('max_price', 'Maximum Cost: ') }}<br>
		{{ Form::select('max_price', $costOptions, 0) }}
	</div>
	<div class="spacer-5"></div>
	-->
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
		{{ Form::submit('View Printable Results',array('class'=>'btn btn-danger')) }}
	</div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="clearfix"></div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-md-8 col-lg-8">
		{{ Form::submit('Search Resale Homes',array('class'=>'btn btn-success')) }}
	</div>
	<div class="col-md-2 col-lg-2"></div>	
	<div class="clearfix"></div>
</div>

{{ Form::close() }}