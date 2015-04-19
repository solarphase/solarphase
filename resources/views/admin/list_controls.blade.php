<td class="text-right">
	@if (isset($show))
		<a class="btn btn-sm btn-default"
			href="{{ $model->getAdminShowUrl() }}"
			title="{{ trans('admin.view') }}">
			<span class="glyphicon glyphicon-eye-open"></span>
		</a>
	@endif

	<a class="btn btn-sm btn-primary"
		href="{{ $model->getAdminEditUrl() }}"
		title="{{ trans('admin.edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
	</a>

	{!! Form::open(['route' => [$route.'.destroy', $model->id], 'method' => 'delete', 'class' => 'js-delete-confirm inline']) !!}
		<button class="btn btn-sm btn-danger" type="submit" title="{{ trans('admin.delete') }}">
			<span class="glyphicon glyphicon-trash"></span>
		</button>
	{!! Form::close() !!}

@section('javascript')
	<script>
		(function($) {
			$('.js-delete-confirm').submit(function() {
				return confirm('{{ trans('admin.delete_confirm', ['name' => $model->singularName()]) }}');
			});
		})(jQuery);
	</script>
@stop
</td>
