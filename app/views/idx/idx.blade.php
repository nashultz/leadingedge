@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
		@include('buttons.buttons')
	</div>
	<div class="col-md-9 col-lg-9">
		<iframe src="http://david-mccaleb.idx.rewidx.com{{$appendString}}" width="100%" height="2500" scrolling="no" frameborder="0"></iframe>
		<!--
			<iframe src="http://david-mccaleb.idx.rewidx.com?search_zip=78759&minimum_price=1000000&search_city=Austin,Bartlett" width="100%" height="2500" scrolling="no" frameborder="0"></iframe>
		-->
	</div>
	<div class="clearfix"></div>
</div>
@stop