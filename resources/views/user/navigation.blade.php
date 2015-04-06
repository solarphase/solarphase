@if (Auth::check())
	<nav class="admin-nav">
		<div class="container">
			<div class="col-xs-8">
				{{ trans('user.welcome', ['name' => Auth::user()->name]) }}
			</div>
			<div class="col-xs-4 inner-nav">
				<ul>
					<li>
						<a href="{{ URL::route('user.logout') }}"
							title="{{ trans('user.logout') }}">
							<span class="glyphicon glyphicon-log-out"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
@endif
