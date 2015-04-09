@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('title', $model->trans('title')) !!}
		{!! Form::text('title', $model->title, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('order', $model->trans('order')) !!}
		{!! Form::text('order', $model->order, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('uri', $model->trans('uri')) !!}
		{!! Form::text('uri', $model->uri, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('parent_id', $model->trans('parent')) !!}
		{!! Form::select('parent_id', $parents, $model->parent_id, ['class' => 'form-control']) !!}
	</div>
@stop
