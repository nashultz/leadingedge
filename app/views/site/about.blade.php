@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h2 class="section-title">About Us</h2>
			</div>
			<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				<div class="login-form">
					<div class="about-photo col-md-4 col-lg-4">
						{{img('site','tammy-young.jpg',array('class'=>'img-thumbnail'))}}
					</div>
					<div class="col-md-8 col-lg-8">
						<h3 class="info-head">Tammy Young</h3>
						<h4 class="info-head">Biography</h4>
						<div>
							A native Texan, I have been in the Austin area for twelve years and cannot imagine I would ever want to live anywhere else. 
							I am enthusiastic about my full-time real estate business and I take pride in the level of service I provide. I am always 
							keenly aware that my clients trust me with two of the most important assets they have - their home and their money - and I 
							work diligently to protect their interests at all times. My passion for marketing, ethical nature, commitment to excellence, 
							attention to detail, and top notch communication skills insure results and client satisfaction.
						</div>
						<div class="spacer-20"></div>
						<h4 class="info-head">Education</h4>
						<div>
							I received my Bachelor of Science degree in Special Education from the University of New Mexico in 1995.
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@stop