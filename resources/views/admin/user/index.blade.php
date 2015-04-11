@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('name') }}</th>
	<th>{{ $model_class::trans('email') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->name }}</td>
			<td>{{ $model->email }}</td>
			@include('layouts.admin.list_controls', ['model' => $model, 'hide_show' => true])
		</tr>
	@endforeach
@stop
