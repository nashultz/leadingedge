<div class="buttons">
	<div class="button1-text col-md-12 col-lg-12">
		<div class="button-container">
			<button id="button1" class="buttonToggle">Let us help you find the perfect home!</button>
			<div class="button1-form">
				{{ Form::open(array('method'=>'POST','route'=>'post.perfecthome.send', 'class'=>'ajaxForm scrollTop buttonForm')) }}

					<div class="buttonerror">
						<div class="col-md-12 col-lg-12">
							<div class="alert"></div>
						</div>
					</div>

					<div class="col-md-12">
						{{ Form::label('maxprice','Maximum Price: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxprice','',array('class'=>'form-control', 'id'=>'maxprice')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('maxsqft','Maximum Square Foot: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxsqft','',array('class'=>'form-control', 'id'=>'maxsqft')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('cities[]','City: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::select('cities[]', $searchCities, 'Any', array('multiple','class'=>'form-control', 'id'=>'cities[]')) }}
						<span class="help-block"><small>Ctrl/Shift click to select multiple</small></span>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('isds[]','School District: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::select('isds[]', $searchIsds, 'Any', array('multiple','class'=>'form-control', 'id'=>'isds[]')) }}
						<span class="help-block"><small>Ctrl/Shift click to select multiple</small></span>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('beds','Minimum Bedrooms: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::select('beds', $numRooms, 0,array('class'=>'form-control', 'id'=>'beds')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('study','Study: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('study', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('study', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('formalliving','Formal Living: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('formalliving', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('formalliving', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('formaldining','Formal Dining: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('formaldining', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('formaldining', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('gameroom','Game Room: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('gameroom', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('gameroom', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('movedate','Preferred Move Date: ') }}<i class="fa fa-asterisk small req"></i>
						<div class="input-group date">
							{{ Form::text('movedate','',array('class'=>'form-control', 'id'=>'movedate')) }}
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('emailadd','Email Address: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('emailadd','',array('class'=>'form-control', 'id'=>'emailadd')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('phone','Phone: ') }}
						{{ Form::text('phone','',array('class'=>'form-control', 'id'=>'phone')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('realtor','Working with a Realtor: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('realtor', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('realtor', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('comments','Questions or Comments?: ') }}
						{{ Form::textarea('comments','',array('class'=>'form-control', 'id'=>'comments')) }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-12">
						<div class="submit-container">
							{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
						</div>
					</div>
					<div class="clearfix"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="button-space spacer-20"></div>
	<div class="button2-text col-md-12 col-lg-12">
		<div class="button-container">
			<button id="button2" class="buttonToggle">New to the Austin area?</button>
			<div class="button2-form">
				{{ Form::open(array('method'=>'POST','route'=>'post.newaustin.send', 'class'=>'ajaxForm scrollTop buttonForm')) }}

					<div class="buttonerror">
						<div class="col-md-12 col-lg-12">
							<div class="alert alert-danger"></div>
						</div>
					</div>

					<div class="col-md-12">
						<h4 class="button-title">Request your FREE relocation guide!</h4>
					</div>
					<div class="col-md-12">
						{{ Form::label('name','Full Name: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('name','',array('class'=>'form-control', 'id'=>'name')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('address','Mailing Address: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('address','',array('placeholder'=>'Street','class'=>'form-control', 'id'=>'address')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::text('city','',array('placeholder'=>'City','class'=>'form-control', 'id'=>'city')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::select('state',Dropdowns::states(),'TX',array('class'=>'form-control', 'id'=>'state')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::text('zip','',array('class'=>'form-control','placeholder'=>'Zip', 'id'=>'zip')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('emailadd','Email Address: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('emailadd','',array('class'=>'form-control', 'id'=>'emailadd')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('phone','Phone: ') }}
						{{ Form::text('phone','',array('class'=>'form-control', 'id'=>'phone')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('maxprice','Maximum Price: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxprice','',array('class'=>'form-control', 'id'=>'maxprice')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('maxsqft','Maximum Square Foot: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxsqft','',array('class'=>'form-control', 'id'=>'maxsqft')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('movedate','Preferred Move Date: ') }}<i class="fa fa-asterisk small req"></i>
						<div class="input-group date">
							{{ Form::text('movedate','',array('class'=>'form-control', 'id'=>'movedate')) }}
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('realtor','Working with a Realtor: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('realtor', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('realtor', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('comments','Questions or Comments?: ') }}
						{{ Form::textarea('comments','',array('class'=>'form-control', 'id'=>'comments')) }}
					</div>
					<div class="spacer-20"></div>
					<div class="col-md-12">
						<div class="submit-container">
							{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
						</div>
					</div>
					<div class="clearfix"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="button-space spacer-20"></div>
	<div class="button3-text col-md-12 col-lg-12">
		<div class="button-container">
			<button id="button3" class="buttonToggle">Have a house to sell?</button>
			<div class="button3-form">
				{{ Form::open(array('method'=>'POST','route'=>'post.sellhome.send', 'class'=>'ajaxForm scrollTop buttonForm')) }}

					<div class="buttonerror">
						<div class="col-md-12 col-lg-12">
							<div class="alert alert-danger"></div>
						</div>
					</div>

					<div class="col-md-12">
						<h4 class="button-title">Request your FREE market analysis!</h4>
					</div>
					<div class="col-md-12">
						{{ Form::label('name','Full Name: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('name','',array('class'=>'form-control', 'id'=>'name')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('address','Address to be evaluated: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('address','',array('placeholder'=>'Street','class'=>'form-control', 'id'=>'address')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::text('city','',array('placeholder'=>'City','class'=>'form-control', 'id'=>'city')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::select('state',Dropdowns::states(),'TX',array('class'=>'form-control', 'id'=>'state')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::text('zip','',array('placeholder'=>'Zip','class'=>'form-control', 'id'=>'zip')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('emailadd','Email Address: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('emailadd','',array('class'=>'form-control', 'id'=>'emailadd')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('phone','Phone: ') }}
						{{ Form::text('phone','',array('class'=>'form-control', 'id'=>'phone')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('maxprice','Maximum Price: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxprice','',array('class'=>'form-control', 'id'=>'maxprice')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('maxsqft','Maximum Square Foot: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('maxsqft','',array('class'=>'form-control', 'id'=>'maxsqft')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('movedate','Preferred Move Date: ') }}<i class="fa fa-asterisk small req"></i>
						<div class="input-group date">
							{{ Form::text('movedate','',array('class'=>'form-control', 'id'=>'movedate')) }}
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('realtor','Working with a Realtor: ') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('realtor', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('realtor', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('comments','Questions or Comments?: ') }}
						{{ Form::textarea('comments','',array('class'=>'form-control', 'id'=>'comments')) }}
					</div>					
					<div class="spacer-20"></div>
					<div class="col-md-12">
						<div class="submit-container">
							{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
						</div>
					</div>
					<div class="clearfix"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="button-space spacer-20"></div>
	<!--<div class="button4-text col-md-12 col-lg-12">
		<button id="button4">Coupons</button>
		<div class="button4-form">
			<div>PDF's</div>
		</div>
		<div class="button-space spacer-20"></div>
	</div>-->
	<div class="button5-text col-md-12 col-lg-12">
		<div class="button-container">
			<button id="button5" class="buttonToggle">How much can you afford?</button>
			<div class="button5-form">
				{{ Form::open(array('method'=>'POST','route'=>'post.affordhome.send', 'class'=>'ajaxForm scrollTop buttonForm')) }}

					<div class="buttonerror">
						<div class="col-md-12 col-lg-12">
							<div class="alert alert-danger"></div>
						</div>
					</div>

					<div class="col-md-12">
						<h4 class="button-title">Request a pre-qualification analysis!</h4>
					</div>
					<div class="col-md-12">
						{{ Form::label('pprice','Purchase Price: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('pprice','',array('class'=>'form-control', 'id'=>'pprice')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('dpayment','% of Down Payment: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::select('dpayment',array('0'=>'Any', '3.5'=>'3.5%', '5'=>'5%', '10'=>'10%', '20'=>'20%', '20+'=>'More than 20%'),0,array('class'=>'form-control', 'id'=>'dpayment')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('credit','Credit: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::select('credit',array('0'=>'Fair', '1'=>'Good', '2'=>'Excellent', '3'=>'Other'),0,array('class'=>'form-control', 'id'=>'credit')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('aincome','Annual Income: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('aincome','',array('class'=>'form-control', 'id'=>'aincome')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('mdebt','Monthly Debt (exclude Rent): ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('mdebt','',array('class'=>'form-control', 'id'=>'mdebt')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('email','Email Address: ') }}<i class="fa fa-asterisk small req"></i>
						{{ Form::text('email','',array('class'=>'form-control', 'id'=>'emailadd')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('phone','Phone: ') }}
						{{ Form::text('phone','',array('class'=>'form-control', 'id'=>'phone')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('realtor','Working with a Realtor:') }}<i class="fa fa-asterisk small req"></i><br>
						<div class="col-md-6">
							{{ Form::radio('realtor', 1) }} Yes
						</div>
						<div class="col-md-6">
							{{ Form::radio('realtor', 0, true) }} No
						</div><div class="clearfix"></div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						{{ Form::label('comments','Questions or Comments?: ') }}
						{{ Form::textarea('comments','',array('class'=>'form-control', 'id'=>'comments')) }}
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-12">
						<p>Your request will be sent to a mortgage loan officer.</p>
						<div class="clearfix"></div>
					</div>					
					<div class="spacer-20"></div>
					<div class="col-md-12">
						<div class="submit-container">
							{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
						</div>
					</div>
					<div class="clearfix"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="button-space spacer-20"></div>
	<div class="clearfix"></div>
</div>

