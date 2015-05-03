@if (Auth::check())
	<hr>
	<div class="form-group text-right">
		<a class="btn btn-sm btn-default"
			href="{{ URL::route($route.'.index') }}">
			{{ trans('admin.administrate') }}
			<span class="glyphicon glyphicon-list"></span>
		</a>
		<a class="btn btn-sm btn-primary"
			href="{{ URL::route($route.'.edit', $model->id) }}">
			{{ trans('admin.edit') }}
			<span class="glyphicon glyphicon-edit"></span>
		</a>
	</div>
@endif

