@extends('layouts.admin.show')

@section('show')
	{!! $model->toHtml() !!}
@stop
