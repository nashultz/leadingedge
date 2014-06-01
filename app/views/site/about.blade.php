@extends('layouts.sitedefault')

@section('content')
<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<div class="login-form">
			<div class="col-md-12 col-lg-12">
				<h2 class="section-title">About Us</h2>
			</div>
			<div class="col-md-12 col-lg-12">
				<div class="about">
					<p>At Leading Edge Realty, you can rely on our knowledge and experience to help you navigate the constantly changing Austin 
						real estate market.   Media sound bites paint a picture of a seller’s market where homes sell within hours with multiple 
						offers almost certain and qualified buyers cannot find a home to buy.  That is true in many situations and areas of town, 
						but it is not the case in every area or every price point.   The expertise of a Leading Edge Realtor insures that you 
						have accurate information relevant to your individual real estate needs.  Together, we will devise a strategy to meet 
						your goals.</p>
					<p>We love this business, enjoy what we do and have fun doing it!  Whether you are native to Austin or moving here from out 
						of town, a change of address can be challenging and sometimes overwhelming.  Our job is to assist you through the process 
						as smoothly as possible. </p>
					<p>We are always keenly aware that our clients trust us with two of the most important assets you have – your home and your 
						money - and we work diligently to protect your interests at all times. Our commitment to excellence, attention to detail, 
						and top notch communication skills insure results and client satisfaction. </p>
					<p>Call us today and let’s sit down and talk for a while!</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="login-form">
					<div class="about-photo col-md-4 col-lg-4">
						{{img('site','tammy-young.jpg',array('class'=>'img-circle img-thumbnail'))}}
					</div>
					<div class="col-md-8 col-lg-8">
						<h3 class="info-head">Tammy Young </h3>
						<h5><span class="label label-default">Broker/Owner</span></h5>
						<div class="spacer-15"></div>
						<h4 class="info-head">Biography</h4>
						<div class="bio">
							A native Texan, I have been in the Austin area for fourteen years and cannot imagine I would ever want to live anywhere 
							else.  I earned a degree in Special Education from the University of New Mexico and taught in public schools prior to 
							my transition into home sales in 2002.  My real estate career began in new construction selling homes for the builders. 
							I am really excited about SearchNewHomesAustin.com because it takes me back to my roots in new construction and affords 
							us an opportunity to assist more people who are interested in purchasing a brand new home as well as continuing to work 
							in the resale market.  My background and experience in both resale and new construction is an added benefit to our clients.
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="login-form">
					<div class="about-photo col-md-4 col-lg-4">
						{{img('site','david-mccaleb.jpg',array('class'=>'img-circle img-thumbnail'))}}
					</div>
					<div class="col-md-8 col-lg-8">
						<h3 class="info-head">David McCaleb</h3>
						<h5><span class="label label-default">Realtor/Owner</span></h5>
						<div class="spacer-15"></div>
						<h4 class="info-head">Biography</h4>
						<div class="bio">
							Also native to Texas, I have been in the Austin area for 16 years.  My degree is in Finance and it was completed 
							at the University of Houston.  I have spent many years in both large public companies as well as being an entrepreneur 
							for the past twelve years.  Our clients benefit from our collaboration and synergy.  We look forward to helping you 
							find the home of your dreams.
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