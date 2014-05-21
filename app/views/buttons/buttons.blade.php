

<div class="buttons">
	<div class="button1-text col-md-12 col-lg-12">
		<button id="button1">Let us help you find the perfect home!</button>
		<div class="button1-form">
			{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
				<div class="col-md-12">
					{{ Form::label('price','Price: ') }}
					{{ Form::text('price') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('sqft','Square Foot: ') }}
					{{ Form::text('sqft') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('city','City: ') }}
					{{ Form::select('city', $cities, 0) }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('schoold','School District: ') }}
					{{ Form::select('schoold', $isds, 0) }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('beds','Bedrooms: ') }}
					{{ Form::select('beds') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('study','Study: ') }}<br>
					<div class="col-md-6">
						{{ Form::radio('study', 1) }} Yes
					</div>
					<div class="col-md-6">
						{{ Form::radio('study', 0, true) }} No
					</div><div class="clearfix"></div>
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('formalliving','Formal Living: ') }}<br>
					<div class="col-md-6">
						{{ Form::radio('formalliving', 1) }} Yes
					</div>
					<div class="col-md-6">
						{{ Form::radio('formalliving', 0, true) }} No
					</div><div class="clearfix"></div>
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('formaldining','Formal Dining: ') }}<br>
					<div class="col-md-6">
						{{ Form::radio('formaldining', 1) }} Yes
					</div>
					<div class="col-md-6">
						{{ Form::radio('formaldining', 0, true) }} No
					</div><div class="clearfix"></div>
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('gameroom','Game Room: ') }}<br>
					<div class="col-md-6">
						{{ Form::radio('gameroom', 1) }} Yes
					</div>
					<div class="col-md-6">
						{{ Form::radio('gameroom', 0, true) }} No
					</div><div class="clearfix"></div>
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('movedate','Preferred Move Date: ') }}
					{{ Form::text('movedate') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('emailadd','Email Address: ') }}
					{{ Form::text('emailadd') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('phone','Phone: ') }}
					{{ Form::text('phone') }}
				</div>
				<div class="spacer-5"></div>
				<div class="col-md-12">
					{{ Form::label('realtor','Working with Realtor: ') }}<br>
					<div class="col-md-6">
						{{ Form::radio('realtor', 1) }} Yes
					</div>
					<div class="col-md-6">
						{{ Form::radio('realtor', 0, true) }} No
					</div><div class="clearfix"></div>
				</div>
				<div class="spacer-20"></div>
				<div class="col-md-12">
					{{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
				</div>
				<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="button2-text col-md-12 col-lg-12">
		<button id="button2">New to the Austin area?</button>
		<div class="button2-form">
			{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
				{{ Form::label('city','City: ') }}<br>
				{{ Form::select('city', $cities, 0) }}
				<div class="spacer-20"></div>
				{{ Form::submit('Search',array('class'=>'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="button3-text col-md-12 col-lg-12">
		<button id="button3">Have a house to sell?</button>
		<div class="button3-form">
			{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
				{{ Form::label('city','City: ') }}<br>
				{{ Form::select('city', $cities, 0) }}
				<div class="spacer-20"></div>
				{{ Form::submit('Search',array('class'=>'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="button4-text col-md-12 col-lg-12">
		<button id="button4">Coupons</button>
		<div class="button4-form">
			{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
				{{ Form::label('city','City: ') }}<br>
				{{ Form::select('city', $cities, 0) }}
				<div class="spacer-20"></div>
				{{ Form::submit('Search',array('class'=>'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="button5-text col-md-12 col-lg-12">
		<button id="button5">How much can you afford?</button>
		<div class="button5-form">
			{{ Form::open(array('method'=>'GET','route'=>'get.search.results')) }}
				{{ Form::label('city','City: ') }}<br>
				{{ Form::select('city', $cities, 0) }}
				<div class="spacer-20"></div>
				{{ Form::submit('Search',array('class'=>'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="clearfix"></div>
</div>

