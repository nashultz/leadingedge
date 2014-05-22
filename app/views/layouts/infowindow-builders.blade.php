<!DOCTYPE html>
<html>
	<head>
		<title>Builders Infowindow</title>
	</head>
	<body>
		<div class="infowindow">
			@if ($neighborhood)
				<h4 class="section-title">{{ $neighborhood->name }}</h4>
				@if ($ajaxBuilders)
					@foreach($ajaxBuilders as $builder)
						<h5 class="info-head">{{ $builder->name }}</h5> <br>
						Minimum Price Range: ${{ number_format($builder->min_price) }}<br>
						Maximum Price Range: ${{ number_format($builder->max_price) }}<br>
						<hr>
					@endforeach
				@else
					{{ 'No Builders' }}
				@endif
			@else
				{{ 'What is this?' }}
			@endif
		</div>
	</body>
</html>