<!DOCTYPE html>
<html>
	<head>
		<title>Builders Infowindow</title>
	</head>
	<body>
		<div class="infowindow">
			@if ($neighborhood)
				<h4 class="section-title">{{ $neighborhood->name }} ({{ $ajaxBuilders->count() }})</h4>

				{{ $neighborhood->city }}<br>
				{{ $neighborhood->district }}<br>

				@if ($ajaxBuilders)
					@foreach($ajaxBuilders as $builder)
						<h5 class="info-head">{{ $builder->name }}</h5> <br>
						Price: ${{ number_format($builder->min_price) }} - ${{ number_format($builder->max_price) }}<br>
						Square Footage: {{ number_format($builder->min_size) }} - {{ number_format($builder->max_size) }}<br>
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