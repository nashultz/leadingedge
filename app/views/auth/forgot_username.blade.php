@if (Session::has('notification'))
	{{ Session::get('notification') }}	
@endif	

{{ Form::open() }}

	{{ Form::label('email','Email: ') }}
	{{ Form::text('email') }}

	{{ Form::label('password', 'Password: ') }}
	{{ Form::password('password') }}

	{{ Form::submit('Retrieve Username') }}

{{ Form::close() }}