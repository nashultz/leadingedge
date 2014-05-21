@extends('layouts.sitedefault')

@section('content')	
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
				{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}

				<div class="search-form">
					<div class="col-md-12 col-lg-12">
						<h3 class="section-title">Search</h3>
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('city','City: ') }}<br>
						{{ Form::select('city', $cities, 0) }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('isd', 'ISD: ') }}<br>
						{{ Form::select('isd', $isds, 0) }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('neighborhood', 'Neighborhood') }}<br>
						{{ Form::select('neighborhood', $neighborhoods, 0) }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('builder', 'Builders: ') }}<br>
						{{ Form::select('builder', $builders, 0) }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('min_price', 'Minimum Cost: ') }}<br>
						{{ Form::select('min_price', $costOptions, 0) }}
					</div>
					<div class="col-md-4 col-lg-4">
						{{ Form::label('max_price', 'Maximum Cost: ') }}<br>
						{{ Form::select('max_price', $costOptions, 0) }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-12 col-lg-12">
						{{ Form::submit('Search',array('class'=>'btn btn-success')) }}
					</div>
					<div class="clearfix"></div>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop