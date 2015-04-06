@if (Auth::check())
	<p>{{ trans('user.welcome', ['name' => Auth::user()->name]) }}</p>
	<ul>
		<li>
			<a href="{{ URL::route('user.logout') }}">
				{{ trans('user.logout') }}
			</a>
		</li>
	</ul>
@else
	<ul>
		<li>
			<a href="{{ URL::route('user.login') }}">
				{{ trans('user.login') }}
			</a>
		</li>
	</ul>
@endif
