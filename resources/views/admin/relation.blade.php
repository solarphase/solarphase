<div class="form-group">
	{!! Form::label("{$relation}_id", $model->trans($relation)) !!}
	{!! Form::select("{$relation}_id", $objects, $model->{"{$relation}_id"}, ['class' => 'form-control']) !!}

	@if ($model->{$relation})
		<p class="text-right top-10">
			<a href="{{ $model->{$relation}->getAdminEditUrl() }}">
				{{ trans('admin.goto_relation') }}
			</a>
		</p>
	@endif
</div>
