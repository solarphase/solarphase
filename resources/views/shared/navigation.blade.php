<div class="logo text-center">
	<a href="/">
		<img src="{{ URL::asset('img/logo.png') }}" alt="SolarPhase">
	</a>
</div>
<hr/>

<nav>
	<ul>
		@foreach ($navigation_links as $link)
			@include('shared.link', ['link' => $link])
		@endforeach
	</ul>
</nav>
