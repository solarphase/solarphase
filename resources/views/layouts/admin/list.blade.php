@extends('layouts.master')

@section('content')
	<div class="admin-list">
		<h2>{{ $model_class::pluralName() }}</h2>
		<hr>
		
		<table class="table">
			<thead>
				<tr>
					@yield('thead')

					<th class="text-right">
						<a class="btn btn-sm btn-primary"
							href="{{ $model_class::getAdminCreateUrl() }}"
							title="{{ trans('admin.create') }}">
							<span class="glyphicon glyphicon-file"></span>
						</a>
					</th>
				</tr>
			</thead>
			<tbody>
				@yield('tbody')
			</tbody>
		</table>
	</div>
@stop
