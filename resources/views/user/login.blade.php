@extends('layouts.master')

@section('content')
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<h2>{{ trans('user.login') }}</h2>
		@if ($model['failure'])
			<p class="alert alert-danger">{{ trans('user.login_failed') }}</p>
		@endif

		{!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

		<div class="form-group">
		{!! Form::label('email', trans('model.users_email')) !!}
		{!! Form::email('email', $model['email'], ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', trans('model.users_password')) !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		<div class="checkbox">
			<label>
				{!! Form::checkbox('remember', 'yes', $model['remember']) !!}
				{{ trans('user.remember') }}
			</label>
		</div>

		<div class="form-group text-right">
			{!! Form::submit(trans('user.login'), ['class' => 'btn btn-sm btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
@endsection
