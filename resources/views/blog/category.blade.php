@extends('layouts.master')

@section('content')
	<h2>{{ $model->title }}</h2>
	@foreach ($articles as $article)
		@include('blog.article_partial', ['article' => $article])
	@endforeach

	@include('shared.pagination', ['models' => $articles])
@stop
