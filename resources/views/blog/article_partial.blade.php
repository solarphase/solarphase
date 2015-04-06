<article>
	<header>
		<h2>
			<a href="">{{ $article->title }}</a>
		</h2>
		@if ($model->published_at)
			<p><time>{{ $article->published_at->diffForHumans() }}</time></p>
		@endif
	</header>
	<div class="content">
		{!! $article->toHtml() !!}
	</div>
</article>
