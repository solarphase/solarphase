@extends('layouts.master')

@section('content')
	<div class="blog">
		@include('blog.article_partial', ['article' => $model])
	</div>
	@include('admin.inline_controls', ['route' => 'admin.blog.article'])
@stop
