@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('public') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->title }}</td>
			<td>
				@if ($model->public)
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</td>
			@include('layouts.admin.list_controls')
		</tr>
	@endforeach
@stop
