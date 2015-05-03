@extends('layouts.master')

@section('content')
	{!! $model->toHtml() !!}
	@include('admin.inline_controls', ['route' => 'admin.storage.document'])
@stop
