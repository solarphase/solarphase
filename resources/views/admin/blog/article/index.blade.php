@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('category') }}</th>
	<th>{{ $model_class::trans('published') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->title }}</td>
			<td>
				<a href="{{ $model->category->getAdminEditUrl() }}">
					{{ $model->title }}
				</a>
			</td>
			<td>
				@if ($model->isPublished())
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</td>
			@include('admin.list_controls', ['model' => $model, 'show' => true])
		</tr>
	@endforeach
@stop
