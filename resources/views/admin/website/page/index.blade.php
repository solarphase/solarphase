@extends('layouts.admin.list')

@section('thead')
	<th>{{ $model_class::trans('title') }}</th>
	<th>{{ $model_class::trans('uri') }}</th>
	<th>{{ $model_class::trans('link') }}</th>
@stop

@section('tbody')
	@foreach ($models as $model)
		<tr>
			<td>{{ $model->title }}</td>
			<td>{{ $model->uri }}</td>
			<td>
				@if ($model->link)
					<a href="{{ URL::route('admin.website.link.edit', $model->link->id) }}">
						{{ $model->link->title }}
					</a>
				@else
					&ndash;
				@endif
			</td>
			@include('admin.list_controls', ['model' => $model, 'show' => true])
		</tr>
	@endforeach
@stop
