<html>

	<head>

	</head>

	<body>
		

		@if ($neighborhood)

			<h2>{{ $neighborhood->name }}</h2>

			@if ($ajaxBuilders)

				@foreach($ajaxBuilders as $builder)

					<h4>{{ $builder->name }}</h4> <br>
					Minimum Price Range: $ {{ number_format($builder->min_price) }}<br>
					Maximum Price Range: $ {{ number_format($builder->max_price) }}<br>
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