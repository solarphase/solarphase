@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('name', $model->trans('name')) !!}
		{!! Form::text('name', $model->name, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', $model->trans('email')) !!}
		{!! Form::text('email', $model->email, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', $model->trans('password')) !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
@stop
