@extends('layouts.master')

@section('content')
	@if ($model['failure'])
		<p>Login failed!</p>
	@endif

	{!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

	{!! Form::label('email', 'Email') !!}
	{!! Form::email('email', $model['email']) !!}

	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password') !!}

	{!! Form::submit('Login') !!}

	{!! Form::close() !!}
@endsection
