<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | SolarPhase</title>
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
	@include('user.navigation')

	<div class="container">
		<div class="row">
			<nav class="col-xs-12 col-sm-4 col-md-3 website-nav">
				@include('shared.navigation')
			</nav>
			<div class="col-xs-12 col-sm-8 col-md-9">
				<hr class="visible-xs">
				@include('shared.message')
				@yield('content')
				<hr class="visible-xs">
			</div>
		</div>
	</div>

	@include('shared.footer')

	<script src="{{ URL::asset('js/vendor.js') }}"></script>
	@yield('javascript')
</body>
</html>
