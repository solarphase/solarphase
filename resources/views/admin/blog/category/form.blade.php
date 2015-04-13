@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('title', $model->trans('title')) !!}
		{!! Form::text('title', $model->title, ['class' => 'form-control']) !!}
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('master', 'yes', $model->master) !!}
			{{ $model->trans('master') }}
		</label>
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('enabled', 'yes', $model->enabled) !!}
			{{ $model->trans('enabled') }}
		</label>
	</div>

	@include('admin.relation', ['relation' => 'link', 'objects' => $links])
@stop
