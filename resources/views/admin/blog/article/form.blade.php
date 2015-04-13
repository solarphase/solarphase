@extends('layouts.admin.form')

@section('form')
	<div class="form-group">
		{!! Form::label('title', $model->trans('title')) !!}
		{!! Form::text('title', $model->title, ['class' => 'form-control']) !!}
	</div>

	@include('admin.content_editor', ['model' => $model])
	<hr>
	
	@include('admin.relation', ['relation' => 'category', 'objects' => $categories])

	<div class="checkbox">
		<label>
			{!! Form::checkbox('published', 'yes', $model->isPublished()) !!}
			{{ $model->trans('published') }}
		</label>
	</div>
@stop

@section('javascript')
	<script src="{{ URL::asset('js/admin/content-editor.js') }}"></script>
@stop
