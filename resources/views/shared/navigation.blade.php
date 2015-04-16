<nav>
	<div class="logo">
		<a href="/">
			<img src="{{ URL::asset('img/logo.png') }}" alt="SolarPhase">
		</a>
	</div>

	<ul>
		@foreach ($navigation_links as $link)
			@include('shared.link', ['link' => $link])
		@endforeach
	</ul>
</nav>
