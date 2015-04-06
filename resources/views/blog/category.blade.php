@extends('layouts.master')

@section('content')
	<div class="blog synopsisized">
		@foreach ($articles as $article)
			@include('blog.article_partial', ['article' => $article])
		@endforeach
	</div>

	@include('shared.pagination', ['models' => $articles])
@stop
