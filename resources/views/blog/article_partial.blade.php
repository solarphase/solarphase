<article>
	<header>
		<h2>
			<a href="{{ URL::route('blog.article', ['id' => $article->id]) }}">
				{{ $article->title }}
			</a>
		</h2>
		@if ($article->published_at && $article->published_by)
			<p>
				{{ trans('article.published') }}
				<time>{{ $article->published_at->diffForHumans() }}</time>
				{{ trans('article.by') }}
				<strong>{{ $article->published_by->name }}</strong>
			</p>
		@endif
	</header>
	<div class="content">
		{!! $article->toHtml() !!}
	</div>
</article>
