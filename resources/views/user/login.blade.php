@extends('layouts.master')

@section('content')
	@if ($model['failure'])
		<p>{{ trans('user.login_failed') }}</p>
	@endif

	{!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

	{!! Form::label('email', trans('model.users_email')) !!}
	{!! Form::email('email', $model['email']) !!}

	{!! Form::label('password', trans('model.users_password')) !!}
	{!! Form::password('password') !!}

	{!! Form::submit(trans('user.login')) !!}

	{!! Form::close() !!}
@endsection
