{{ Form::open(array('id'=>'mortgage')) }}

	{{ Form::label('property_cost', 'Property Cost:') }}
	{{ Form::text('property_cost') }}

	{{ Form::label('length_years', 'Length (Years):') }}
	{{ Form::text('length_years') }}

	{{ Form::label('length_months', 'Length (Months):') }}
	{{ Form::text('length_months') }}

	{{ Form::label('interest_rate_percentage', 'Rate %') }}
	{{ Form::text('interest_rate_percentage') }}

	{{ Form::label('interest_rate_ft2', 'Rate ft^2:') }}
	{{ Form::text('interest_rate_ft2') }}

	{{ Form::label('down_payment', 'Down Payment') }}
	{{ Form::select('down_payment', array('3'=>'3', '3.5'=>'3.5')) }}

	{{ Form::label('annual_ins', 'Annual Ins:') }}
	{{ Form::text('annual_ins') }}

	{{ Form::label('annual_taxes', 'Annual Taxes:') }}
	{{ Form::text('annual_taxes') }}

	{{ Form::label('monthly_fees', 'Monthly Fees:') }}
	{{ Form::text('monthly_fees') }}

	{{ Form::label('monthly_payment', 'Monthly Payment') }}
	{{ Form::text('monthly_payment', '', array('disabled'=>'disabled')) }}

{{ Form::close() }}