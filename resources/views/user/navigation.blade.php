@if (Auth::check())
	<nav class="admin-nav">
		<div class="container">
			<div class="col-xs-8">
				{!! trans('user.welcome', ['name' => Auth::user()->name]) !!}
			</div>
			<div class="col-xs-4 inner-nav">
				<ul>
					<li>
						<a href="{{ URL::route('user.logout') }}"
							title="{{ trans('user.logout') }}">
							<span class="glyphicon glyphicon-log-out"></span>
						</a>
					</li>
					<li class="dropdown text-left">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">
							<span class="glyphicon glyphicon-hdd"></span>
						</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="{{ URL::route('admin.storage.file.index') }}">
									<span class="glyphicon glyphicon-file"></span>
									{{ trans_choice('model.storage_files', 2) }}
								</a>
							</li>
							<li>
								<a href="{{ URL::route('admin.storage.document.index') }}">
									<span class="glyphicon glyphicon-font"></span>
									{{ trans_choice('model.storage_documents', 2) }}
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown text-left">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">
							<span class="glyphicon glyphicon-globe"></span>
						</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="{{ URL::route('admin.website.link.index') }}">
									<span class="glyphicon glyphicon-link"></span>
									{{ trans_choice('model.website_links', 2) }}
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
@endif
