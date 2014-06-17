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
				<iframe src="//www.youtube.com/embed/videoseries?list={{$neighborhood->playlist}}" frameborder="0" allowfullscreen></iframe><br>
			</div>
		</div><div class="clearfix"></div></div>
	</div>
	<div class="col-md-6 col-lg-6">
		<div class="neighborhood">
			<div class="col-md-12 col-lg-12">
				<h3 class="section-title">{{ $neighborhood->getName() }}</h3>
				<div><b>City</b>: {{$neighborhood->city}}</div>
				<div><b>School District</b>: {{$neighborhood->isd}}</div>
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
						<strong>Website</strong>: <a href="http://www.{{$builder->website}}" target="_blank">{{$builder->website}}</a><br>
						
					</div>
					<div class="col-md-6 col-lg-6">
						<strong>Price</strong>: ${{$builder->min_price}} - ${{$builder->max_price}}<br>
						<strong>Square Foot</strong>: {{$builder->min_size}} - {{$builder->max_size}}
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