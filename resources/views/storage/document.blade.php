@extends('layouts.master')

@section('content')
	{!! $model->toHtml() !!}
@stop
