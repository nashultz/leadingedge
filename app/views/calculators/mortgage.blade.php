@extends('layouts.sitedefault')

@section('content')
{{ Form::open(array('id'=>'mortgage')) }}
	
	<div class="col-md-12 col-lg-12">
		<h2 class="section-title">Mortgage Calculator</h2>
	</div>

		<div class="login-form mortgage_calculator_form">

		<div class="col-md-12 col-lg-12">
			{{ Form::label('property_cost', 'Property Cost:') }}
			$ {{ Form::text('property_cost') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('length_years', 'Length:') }}
			Years: {{ Form::text('length_years') }}
			Months: {{ Form::text('length_months') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('interest_rate', 'Interest Rate:') }}
			% {{ Form::text('interest_rate') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('down_payment', 'Down Payment: ') }}
			% {{ Form::text('down_payment_percentage') }}
			$ {{ Form::text('down_payment_amount') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('annual_ins', 'Annual Insurance:') }}
			% {{ Form::text('annual_ins_percentage', '0') }}
			$ {{ Form::text('annual_ins_amount', '0.00') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('annual_taxes', 'Annual Taxes:') }}
			% {{ Form::text('annual_taxes_percentage', '0') }}
			$ {{ Form::text('annual_taxes_amount', '0.00') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('monthly_fees', 'Monthly Fees:') }}
			$ {{ Form::text('monthly_fees', '0.00') }}
		</div>
		<div class="spacer-5"></div>
		<div class="col-md-12 col-lg-12">
			{{ Form::label('monthly_payment', 'Monthly Payment') }}
			$ {{ Form::text('monthly_payment', '', array('disabled'=>'disabled')) }}
		</div>
	</div>
{{ Form::close() }}
@stop