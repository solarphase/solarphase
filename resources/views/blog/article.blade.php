@extends('layouts.master')

@section('content')
	<div class="blog">
		@include('blog.article_partial', ['article' => $model])
	</div>
@stop
