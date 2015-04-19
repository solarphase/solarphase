@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('order') }}</th>
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('uri') }}</th>
	<th>{{ $model_class::trans('parent') }}</th>
	<th>{{ $model_class::trans('association') }}</th>
@stop

@section('tbody')
	@foreach ($models->where('parent_id', null) as $model)
		@include('admin.website.link.row', ['model' => $model])
	@endforeach
@stop
