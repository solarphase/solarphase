@extends('layouts.admin.show')

@section('show')
	<div class="blog">
		@include('blog.article_partial', ['article' => $model])
	</div>
@stop
