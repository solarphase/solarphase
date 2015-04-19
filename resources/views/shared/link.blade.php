@if ($link->isEnabled())
	<li class="{{ in_array($link->id, $active_links) ? 'active' : '' }}">
		<a href="{{ $link->uri }}">{{ $link->title }}</a>
		@if ($link->children && in_array($link->id, $active_links))
			<ul>
				@foreach ($link->children()->orderBy('order', 'desc')->get() as $child)
					@include('shared.link', ['link' => $child])
				@endforeach
			</ul>
		@endif
	</li>
@endif
