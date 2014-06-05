@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<div>
			<div class="col-md-12 col-lg-12">
				<h2 class="section-title">{{ $neighborhood->getName() }}</h2>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="neighborhood"><div class="col-md-12 col-lg-12">
					<h4 class="section-title">Videos</h4>
					<div>YouTube player here</div>
					<div>YouTube playlist here</div>
				</div><div class="clearfix"></div></div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="neighborhood"><div class="col-md-12 col-lg-12">
					<div><b>City</b>: {{$neighborhood->city}}</div>
					<div><b>School District</b>: {{$neighborhood->isd}}</div>
				</div><div class="clearfix"></div></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@stop