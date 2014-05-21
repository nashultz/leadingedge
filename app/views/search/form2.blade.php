	
{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
<div class="search-form">
	<div class="col-md-12 col-lg-12">
		<h3 class="section-title">Search</h3>
	</div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('city','City: ') }}<br>
		{{ Form::select('city', $cities, 0) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('isd', 'ISD: ') }}<br>
		{{ Form::select('isd', $isds, 0) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('neighborhood', 'Neighborhood') }}<br>
		{{ Form::select('neighborhood', $neighborhoods, 0) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('builder', 'Builders: ') }}<br>
		{{ Form::select('builder', $builders, 0) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('min_price', 'Minimum Cost: ') }}<br>
		{{ Form::select('min_price', $costOptions, 0) }}
	</div>
	<div class="spacer-5"></div>
	<div class="col-md-12 col-lg-12">
		{{ Form::label('max_price', 'Maximum Cost: ') }}<br>
		{{ Form::select('max_price', $costOptions, 0) }}
	</div>
	<div class="spacer-10"></div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-md-8 col-lg-8">
		{{ Form::submit('Search',array('class'=>'btn btn-danger')) }}
	</div>
	<div class="col-md-2 col-lg-2"></div>
	<div class="clearfix"></div>
</div>

{{ Form::close() }}