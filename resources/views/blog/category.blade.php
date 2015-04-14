@extends('layouts.master')

@section('content')
	<div class="blog synopsisized">
		@forelse ($articles as $article)
			@include('blog.article_partial', ['article' => $article])
		@empty
			<h1>{{ trans('category.empty_heading') }}</h1>
			<p>{{ trans('category.empty') }}</p>
		@endforelse
	</div>

	@include('shared.pagination', ['models' => $articles])
@stop
