@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('order') }}</th>
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('uri') }}</th>
	<th>{{ $model_class::trans('parent') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->order }}</td>
			<td>{{ $model->title }}</td>
			<td>{{ $model->uri }}</td>
			<td>
				@if ($model->parent)
					<a href="{{ URL::route('admin.website.link.edit', $model->parent->id) }}">
						{{ $model->parent->title }}
					</a>
				@endif
			</td>
			@include('admin.list_controls', ['model' => $model])
		</tr>
	@endforeach
@stop
