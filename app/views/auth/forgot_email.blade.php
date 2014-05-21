@if (Session::has('notification'))
	{{ Session::get('notification') }}	
@endif	

{{ Form::open() }}

	{{ Form::label('username','Username: ') }}
	{{ Form::text('username') }}

	{{ Form::label('password', 'Password: ') }}
	{{ Form::password('password') }}

	{{ Form::submit('Retrieve Email') }}

{{ Form::close() }}