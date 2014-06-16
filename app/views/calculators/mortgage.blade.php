@extends('layouts.sitedefault')

@section('content')


<div class="login-register">
	<div class="col-md-12 col-lg-12">
		<div class="col-md-12 col-lg-12">
			<h2 class="section-title">Mortgage Calculator</h2>
		</div>
		<div class="clearfix"></div>
		<div class="login-form">
			<div class="col-md-6 col-lg-6">
				<div class="about">
				{{ Form::open(array('id'=>'mortgage')) }}
					<div class="col-md-6 col-lg-6">
						{{ Form::label('property_cost', 'Property Cost:') }}
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('property_cost', '', array('id'=>'property_cost','class'=>'form-control','tabindex'=>'1')) }}
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('interest_rate', 'Interest Rate:') }}
						<div class="input-group">
							{{ Form::text('interest_rate', '', array('id'=>'interest_rate','class'=>'form-control','tabindex'=>'4')) }}
							<span class="input-group-addon">%</span>
						</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('length_years', 'Length:') }}
						<div class="input-group">
							{{ Form::text('length_years', '', array('id'=>'length_years','placeholder'=>'Years','class'=>'form-control','tabindex'=>'2')) }}
							<span class="input-group-addon">Years</span>
						</div>
						<div class='spacer-5'></div>
						<div class="input-group">
							{{ Form::text('length_months', '', array('id'=>'length_months','placeholder'=>'Months','class'=>'form-control','tabindex'=>'3')) }}
							<span class="input-group-addon">Months</span>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('down_payment', 'Down Payment: ') }}
						<div class="input-group">
							{{ Form::text('down_payment_percentage', '', array('id'=>'down_payment_percentage','class'=>'form-control','tabindex'=>'5')) }}
							<span class="input-group-addon">%</span>
						</div>
						<div class='spacer-5'></div>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('down_payment_amount', '', array('id'=>'down_payment_amount','class'=>'form-control','tabindex'=>'6')) }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="about">
					<div class="col-md-6 col-lg-6">
						{{ Form::label('annual_ins', 'Annual Insurance:') }}
						<div class="input-group">
							{{ Form::text('annual_ins_percentage', '', array('id'=>'annual_ins_percentage','class'=>'form-control','tabindex'=>'7')) }}
							<span class="input-group-addon">%</span>
						</div>
						<div class='spacer-5'></div>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('annual_ins_amount', '', array('id'=>'annual_ins_amount','class'=>'form-control','tabindex'=>'8')) }}
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('annual_taxes', 'Annual Taxes:') }}
						<div class="input-group">
							{{ Form::text('annual_taxes_percentage', '', array('id'=>'annual_taxes_percentage','class'=>'form-control','tabindex'=>'9')) }}
							<span class="input-group-addon">%</span>
						</div>
						<div class='spacer-5'></div>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('annual_taxes_amount', '', array('id'=>'annual_taxes_amount','class'=>'form-control','tabindex'=>'10')) }}
						</div>
					</div>
					<div class="spacer-5"></div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('monthly_fees', 'Monthly Fees:') }}
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('monthly_fees', '', array('id'=>'monthly_fees','class'=>'form-control','tabindex'=>'11')) }}
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						{{ Form::label('monthly_payment', 'Monthly Payment') }}
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{{ Form::text('monthly_payment', '', array('disabled'=>'disabled', 'id'=>'monthly_payment','class'=>'form-control')) }}
						</div>
					</div>
					<div class="clearfix"></div>
					{{ Form::close() }}
				</div>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

@stop