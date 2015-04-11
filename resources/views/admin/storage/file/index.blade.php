@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('id') }}</th>
	<th>{{ $model_class::trans('name') }}</th>
	<th>{{ $model_class::trans('mime_type') }}</th>
	<th>{{ $model_class::trans('public') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->id }}</td>
			<td>{{ $model->name }}</td>
			<td>{{ $model->mime_type }}</td>
			<td>
				@if ($model->public)
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</td>
			@include('admin.list_controls', ['model' => $model, 'show' => true])
		</tr>
	@endforeach
@stop
