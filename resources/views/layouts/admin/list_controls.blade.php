<td class="text-right">
	@if (!isset($hide_show))
		<a class="btn btn-sm btn-default"
			href="{{ URL::route($route.'.show', $model->id) }}"
			title="{{ trans('admin.view') }}">
			<span class="glyphicon glyphicon-eye-open"></span>
		</a>
	@endif

	<a class="btn btn-sm btn-primary"
		href="{{ URL::route($route.'.edit', $model->id) }}"
		title="{{ trans('admin.edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
	</a>

	{!! Form::open(['route' => [$route.'.destroy', $model->id], 'method' => 'delete', 'class' => 'inline']) !!}
		<button class="btn btn-sm btn-danger" type="submit" title="{{ trans('admin.delete') }}">
			<span class="glyphicon glyphicon-trash"></span>
		</button>
	{!! Form::close() !!}
</td>
