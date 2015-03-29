<ul>
	@foreach ($navigation_links as $link)
		@include('shared.link', ['link' => $link])
	@endforeach
</ul>
