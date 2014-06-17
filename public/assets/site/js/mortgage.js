// Getters

	function getPropertyCost()
	{
		var property_cost = parseFloat($('#property_cost').val()).toFixed(2);

		if (isNaN(property_cost))
		{
			alert('You must enter a Property Cost');
		}

		return property_cost;
	}	

	function getTermLength()
	{
		var years = parseInt($('#length_years').val());
		var months = parseInt($('#length_months').val());

		if (isNaN(years) && isNaN(months))
		{
			alert('You must enter a valid Term Length');
		}

		var term_length = ( years * 12 ) + months;

		return term_length;
	}

	function getInterestRate()
	{
		return parseFloat($('#interest_rate').val() / 100);
	}

	function getAnnualInterestRate()
	{
		return getInterestRate() / 12;
	}

	function getDownPaymentAmount()
	{
		var down_payment = parseFloat($('#down_payment_amount').val()).toFixed(2);

		if (isNaN(down_payment))
		{
			down_payment = parseFloat('0').toFixed(2);
		}

		return down_payment;
	}

	function getDownPaymentPercentage()
	{
		return parseFloat($('#down_payment_percentage').val()).toFixed(2);
	}

	function getAnnualInsuranceAmount()
	{
		console.log('Pre Float: ' + $('#annual_ins_amount').val());

		var annual_insurance = parseFloat($('#annual_ins_amount').val()).toFixed(2);

		console.log('Pulled Annual Insurance Amount: ' + annual_insurance);

		if (isNaN(annual_insurance))
		{
			annual_insurance = parseFloat('0').toFixed(2);
		}

		return annual_insurance;
	}

	function getMonthlyInsuranceAmount()
	{
		return parseFloat(getAnnualInsuranceAmount() / 12).toFixed(2);
	}

	function getAnnualInsurancePercentage()
	{
		return parseFloat($('#annual_ins_percentage').val()).toFixed(2);
	}

	function getAnnualTaxesAmount()
	{
		var annual_taxes = parseFloat($('#annual_taxes_amount').val()).toFixed(2);

		if (isNaN(annual_taxes))
		{
			annual_taxes = parseFloat('0').toFixed(2);
		}

		return annual_taxes;
	}

	function getMonthlyTaxesAmount()
	{
		return parseFloat(getAnnualTaxesAmount() / 12).toFixed(2);
	}

	function getAnnualTaxesPercentage()
	{
		return parseFloat($('#annual_taxes_percentage').val()).toFixed(2);
	}

	function getMonthlyFees()
	{
		var monthly_fees = parseFloat($('#monthly_fees').val()).toFixed(2);

		if (isNaN(monthly_fees))
		{
			monthly_fees = parseFloat('0').toFixed(2);
		}

		return monthly_fees;
	}

// Setters

	function setMonthlyPaymentAmount()
	{
		var P = getFinancedAmount();
		var i = getAnnualInterestRate();
		var n = getTermLength();

		console.log('--------- START TRANSACTION -----------');
		console.log('Financed Amount: ' + P);
		console.log('Annual Interest Rate: ' + i);
		console.log('Term Length in Months: ' + n);

		console.log('Annual Taxes: ' + getAnnualTaxesAmount());
		console.log('Annual Insurance: ' + getAnnualInsuranceAmount());

		console.log('Monthly Fees: ' + getMonthlyFees());
		console.log('Monthly Taxes: ' + getMonthlyTaxesAmount());
		console.log('Monthly Insurance: ' + getMonthlyInsuranceAmount());
		console.log('-------------- END TRANSACTION -------------')

		var monthly_payment = parseFloat(P * ( i * Math.pow((i+1),n)) / ( Math.pow((i+1),n) - 1) + getMonthlyTaxesAmount() + getMonthlyInsuranceAmount() + getMonthlyFees()).toFixed(2);

		$('#monthly_payment').val(monthly_payment);
	}

	function setDownPaymentPercentage()
	{
		var propertyCost = getPropertyCost();
		var amount = getDownPaymentAmount();

		$('#down_payment_percentage').val( (amount * 100) / propertyCost );
	}

	function setDownPaymentAmount()
	{
		var propertyCost = getPropertyCost();
		var percentage = getDownPaymentPercentage();

		$('#down_payment_amount').val( propertyCost * ( percentage / 100 ) );
	}

	function setAnnualInsurancePercentage()
	{
		var propertyCost = getPropertyCost();
		var amount = getAnnualInsuranceAmount();

		$('#annual_ins_percentage').val( (amount * 100) / propertyCost );
	}

	function setAnnualInsuranceAmount()
	{
		var propertyCost = getPropertyCost();
		var percentage = getAnnualInsurancePercentage();

		$('#annual_ins_amount').val( propertyCost * ( percentage / 100) );
	}

	function setAnnualTaxesPercentage()
	{
		var propertyCost = getPropertyCost();
		var amount = getAnnualTaxesAmount();

		$('#annual_taxes_percentage').val( (amount * 100) / propertyCost );
	}

	function setAnnualTaxesAmount()
	{
		var propertyCost = getPropertyCost();
		var percentage = getAnnualTaxesPercentage();

		$('#annual_taxes_amount').val( propertyCost * ( percentage / 100) );
	}

// Functions

	function getFinancedAmount()
	{
		return getPropertyCost() - getDownPaymentAmount();
	}

// Events

	// Down Payment Percentage Change
		$(document).on('change', '#down_payment_percentage', function() {
			setDownPaymentAmount();
		});

	// Down Payment Amount Change
		$(document).on('change', '#down_payment_amount', function() {
			setDownPaymentPercentage();
		});

	// Annual Insurance Percentage Change
		$(document).on('change', '#annual_ins_percentage', function() {
			setAnnualInsuranceAmount();
		});

	// Annual Insurance Amount Change
		$(document).on('change', '#annual_ins_amount', function() {
			setAnnualInsurancePercentage();
		});

	// Annual Taxes Percentage Change
		$(document).on('change', '#annual_taxes_percentage', function() {
			setAnnualTaxesAmount();
		});

	// Annual Taxes Amount Change
		$(document).on('change', '#annual_taxes_amount', function() {
			setAnnualTaxesPercentage();
		});

	// Calculate Everything Else
		$(document).on('change', '#mortgage', function() {
			setMonthlyPaymentAmount();
		});