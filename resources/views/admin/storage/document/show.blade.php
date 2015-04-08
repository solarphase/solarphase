@extends('layouts.master')

@section('content')
	{!! $model->toHtml() !!}
	<hr>

	<div class="form-group text-right">
		<a class="btn btn-sm btn-default"
			href="{{ URL::route('admin.storage.document.index') }}">
			{{ trans('admin.back') }}
		</a>
	</div>
@stop
