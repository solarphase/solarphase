@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('title', $model->trans('title')) !!}
		{!! Form::text('title', $model->title, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('uri', $model->trans('uri')) !!}
		{!! Form::text('uri', $model->uri, ['class' => 'form-control']) !!}
	</div>

	@include('admin.content_editor', ['model' => $model])
	<hr>

	@include('admin.relation', ['relation' => 'link', 'objects' => $links])
@stop

@section('javascript')
	<script src="{{ URL::asset('js/ace/ace.js') }}"></script>
	<script src="{{ URL::asset('js/admin/content-editor.js') }}"></script>
@stop
