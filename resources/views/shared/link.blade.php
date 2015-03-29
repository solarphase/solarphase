<li>
	@if (in_array($link->id, $active_links))
		*ACTIVE*
	@endif

	<a href="{{ $link->uri }}">{{ $link->title }}</a>
	@if ($link->children)
		@foreach ($link->children as $child)
			@include('shared.link', ['link' => $child])
		@endforeach
	@endif
</li>
