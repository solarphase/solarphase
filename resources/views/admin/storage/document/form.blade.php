@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('title', $model->trans('title')) !!}
		{!! Form::text('title', $model->title, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content', $model->trans('content')) !!}
		@include('admin.content_editor', ['model' => $model])
	</div>
	<hr>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('public', 'yes', $model->public) !!}
			{{ $model->trans('public') }}
		</label>
	</div>
@stop

@section('javascript')
	<script src="{{ URL::asset('js/admin/content-editor.js') }}"></script>
@stop
