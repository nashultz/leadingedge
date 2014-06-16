// Getters

	function getPropertyCost()
	{
		return parseFloat($('#property_cost').val());
	}	

	function getTermLength()
	{
		return ( parseInt($('#length_years')).val() * 12 ) + parseInt($('#length_months').val());
	}

	function getInterestRate()
	{
		return parseFloat($('#interest_rate')).val() / 100;
	}

	function getDownPaymentAmount()
	{
		return parseFloat($('#down_payment_amount')).toFixed(2);
	}

	function getDownPaymentPercentage()
	{
		return parseFloat($('#down_payment_percentage')).toFixed(2);
	}

	function getAnnualInsurance()
	{
		return parseFloat($('#annual_ins').val()).toFixed(2);
	}

	function getAnnualTaxes()
	{
		return parseFloat($('#annual_taxes').val()).toFixed(2);
	}

	function getMonthlyFees()
	{
		return parseFloat($('#monthly_fees').val()).toFixed(2);
	}

// Setters

	function setMonthlyPayment()
	{

	}

	function setDownPaymentPercentage()
	{

	}

	function setDownPaymentAmount()
	{
		var propertyCost = getPropertyCost();
		var percentage = getDownPaymentPercentage();

		$('#down_payment_amount').val( propertyCost * ( percentage / 100 ) );
	}

	function setAnnualInsurancePercentage()
	{

	}

	function setAnnualInsuranceAmount()
	{

	}

	function setAnnualTaxesPercentage()
	{

	}

	function setAnnualTaxesAmount()
	{

	}

// Functions

// Events

	// Down Payment Percentage Change
		$(document).on('change', '#down_payment_percentage', function() {
			alert('triggered');
			setDownPaymentAmount();
		});

$(document).on('change', '#mortgage', function(e) {

	var propertyCost = getPropertyCost();
	var lengthYears = parseInt($('#length_years').val());
	var lengthMonths = parseInt($('#length_months').val());
	var ratePercentage = parseFloat($('#interest_rate_percentage').val());
	var rateFt2 = $('#interest_rate_ft2').text();
	var downPayment = parseFloat($('#down_payment').val());
	var annualIns = $('#annual_ins').text();
	var annualTaxes = $('#annual_taxes').text();
	var monthlyFees = parseFloat($('#monthly_fees').val());
	
	// Display Fields
	var monthlyPayment = $('#monthly_payment');
	var downPaymentDisplay = $('#down_payment_display');

	// Property Cost
	var pc = propertyCost;

	var d = downPayment;

	downPaymentDisplay.val(getCalculatedDownPayment(pc, d));

	// Get Actual Amount Financed
	var p = getAmountFinanced(pc, d);

	// Annual Interest
	var i = ratePercentage / 100 / 12;

	// Term (Months)
	var n = (lengthYears * 12) + lengthMonths;

	//var m2 = p [i(1 + i)^n] / [(1 + i)^n - 1];

	var mFees = monthlyFees;

	var m = getMonthlyPayment(p, i, n, mFees);

	monthlyPayment.val(m);

	console.log(m);

	// Store Monthly Payment
	
	//console.log(m2);

});

function getCalculatedDownPayment(pc, d)
{
	return parseFloat(pc * (d / 100)).toFixed(2);
}

function getAmountFinanced(pc, d)
{
	return pc - getCalculatedDownPayment(pc,d);
}

function getMonthlyPayment(p, i, n, mFees)
{
	return parseFloat(p * ( i * Math.pow((i+1),n)) / ( Math.pow((i+1),n) - 1) + mFees).toFixed(2);
}
