@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<h2 class="section-title">Communities</h2>
	</div>
	<div class="col-md-6 col-lg-6">
		<div class="neighborhood"><div class="col-md-12 col-lg-12">
			<h3 class="section-title">Videos</h3>
			<div>
				@if ($neighborhood->playlist)
					<iframe src="//www.youtube.com/embed/videoseries?list={{$neighborhood->playlist}}" frameborder="0" allowfullscreen></iframe><br>
				@else
					<p>There are currently no videos for this neighborhood</p>
				@endif
			</div>
		</div><div class="clearfix"></div></div>
	</div>
	<div class="col-md-6 col-lg-6">
		<div class="neighborhood">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">{{ $neighborhood->getName() }}</h3>
				<div><b>City</b>: {{$neighborhood->city}}</div>
				<div><b>School District</b>: {{$neighborhood->district}}</div>
			</div><div class="clearfix"></div>
		</div>
		<div class="spacer-30"></div>
		<div class="neighborhood">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">Builders</h3>
				@foreach($neighborhood->builders as $builder)
				<div class="builders">
					<div class="col-md-12 col-lg-12">
						<h4 class="section-title">{{$builder->getName()}}</h4>
					</div>
					<div class="col-md-6 col-lg-6">
						<strong>Price</strong>: ${{ number_format($builder->min_price) }} - ${{ number_format($builder->max_price) }}<br>
						<strong>Square Foot</strong>: {{ number_format($builder->min_size) }} - {{ number_format($builder->max_size) }}
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
@stop