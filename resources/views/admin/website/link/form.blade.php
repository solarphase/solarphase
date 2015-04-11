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

	@include('admin.relation', ['relation' => 'parent', 'objects' => $parents])

	@if ($model->getAssociatedModel())
		<h3>{{ $model->trans('association') }}</h3>
		<p>
			<a href="{{ $model->getAssociatedModel()->getAdminEditUrl() }}">
				{{ $model->getAssociatedModel()->title }}
			</a>
		</p>
	@endif
@stop
