@extends('layouts.master')

@section('content')
	@include('blog.article_partial', ['article' => $model])
@stop
