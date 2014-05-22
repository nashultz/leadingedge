<html>

	<head>

	</head>

	<body>
		

		@if ($neighborhood)

			<h3 class="section-title">{{ $neighborhood->name }}</h3>

			@if ($ajaxBuilders)

				@foreach($ajaxBuilders as $builder)

					<h5 class="info-head">{{ $builder->name }}</h4> <br>
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

	</body>

</html>