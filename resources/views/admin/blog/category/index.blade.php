@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('master') }}</th>
	<th>{{ $model_class::trans('enabled') }}</th>
	<th>{{ $model_class::trans('link') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->title }}</td>
			<td>
				@if ($model->master)
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</td>
			<td>
				@if ($model->enabled)
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</td>
			<td>
				@if ($model->link)
					<a href="{{ $model->link->getAdminEditUrl() }}">
						{{ $model->link->title }}
					</a>
				@else
					&ndash;
				@endif
			</td>
			@include('admin.list_controls', ['model' => $model])
		</tr>
	@endforeach
@stop
