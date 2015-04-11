@extends('layouts.master')

@section('content')
	@yield('show')

	<hr>
	<div class="form-group text-right">
		<a class="btn btn-sm btn-default"
			href="{{ URL::route($route.'.index') }}">
			{{ trans('admin.back') }}
		</a>
	</div>
@stop
