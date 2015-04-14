<tr>
	<td>{{ $model->order }}</td>
	<td>{{ $model->title }}</td>
	<td>{{ $model->uri }}</td>
	<td>
		@if ($model->parent)
			<a href="{{ URL::route('admin.website.link.edit', $model->parent->id) }}">
				{{ $model->parent->title }}
			</a>
		@endif
	</td>
	<td>
		@if ($model->getAssociatedModel())
			<a href="{{ $model->getAssociatedModel()->getAdminEditUrl() }}">
				{{ $model->getAssociatedModel()->title }}
			</a>
		@else
			&ndash;
		@endif
	</td>
	@include('admin.list_controls', ['model' => $model])
</tr>
@foreach ($model->children as $child)
	@include('admin.website.link.row', ['model' => $child])
@endforeach
