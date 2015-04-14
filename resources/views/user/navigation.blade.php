@if (Auth::check())
	<nav class="admin-nav">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					{!! trans('user.welcome', ['name' => Auth::user()->name]) !!}
				</div>
				<div class="col-xs-12 col-sm-4 inner-nav">
					<ul>
						<li>
							<a href="{{ URL::route('user.logout') }}"
								title="{{ trans('user.logout') }}">
								<span class="glyphicon glyphicon-log-out"></span>
							</a>
						</li>
						<li class="dropdown text-left">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"
								title="{{ trans('model.storage') }}">
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
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"
								title="{{ trans('model.blog') }}">
								<span class="glyphicon glyphicon-book"></span>
							</a>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="{{ URL::route('admin.blog.category.index') }}">
										<span class="glyphicon glyphicon-folder-open"></span>
										{{ trans_choice('model.blog_categories', 2) }}
									</a>
								</li>
								<li>
									<a href="{{ URL::route('admin.blog.article.index') }}">
										<span class="glyphicon glyphicon-align-left"></span>
										{{ trans_choice('model.blog_articles', 2) }}
									</a>
								</li>
							</ul>
						</li>

						<li class="dropdown text-left">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"
								title="{{ trans('model.website') }}">
								<span class="glyphicon glyphicon-globe"></span>
							</a>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="{{ URL::route('admin.website.link.index') }}">
										<span class="glyphicon glyphicon-link"></span>
										{{ trans_choice('model.website_links', 2) }}
									</a>
								</li>
								<li>
									<a href="{{ URL::route('admin.website.page.index') }}">
										<span class="glyphicon glyphicon-home"></span>
										{{ trans_choice('model.website_pages', 2) }}
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ URL::route('admin.user.index') }}"
								title="{{ trans_choice('model.users', 2) }}">
								<span class="glyphicon glyphicon-user"></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
@endif
