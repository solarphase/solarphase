@extends('layouts.admin.form')

@section('form')
	@if (!$model->id)
		<div class="form-group">
			{!! Form::label('file', $model->singularName()) !!}
			{!! Form::file('file') !!}
		</div>
	@endif

	<div class="checkbox">
		<label>
			{!! Form::checkbox('public', 'yes', $model->public) !!}
			{{ $model->trans('public') }}
		</label>
	</div>
@stop
