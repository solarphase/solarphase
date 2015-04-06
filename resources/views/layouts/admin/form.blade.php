@extends('layouts.master')

@section('content')
	<h2>
		{{ trans_choice('admin.form_title', $model->id || 0, ['model' => $model->singularName()]) }}
	</h2>
	<hr>
	
	@if ($model->id)
		{!! Form::model($model, ['route' => [$route.'.update', $model->id], 'method' => 'put', 'files' => isset($file_upload)]) !!}
	@else
		{!! Form::model($model, ['route' => [$route.'.store'], 'files' => isset($file_upload)]) !!}
	@endif

	@yield('form')
	<hr>
	
	<div class="form-group text-right">
		<a class="btn btn-sm btn-default" href="{{ URL::route($route.'.index') }}">
			{{ trans('admin.cancel') }}
		</a>
		{!! Form::submit(trans('admin.'.($model->id ? 'save' : 'create')), ['class' => 'btn btn-sm btn-primary']) !!}
	</div>
@stop
