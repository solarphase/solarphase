@if ($models->lastPage() > 1)
	<div>
		@if ($models->currentPage() > 1)
			<a href="{{ $models->previousPageUrl() }}">&laquo;</a>
		@endif

		@for ($i = 1; $i <= $models->lastPage(); $i++)
			@if ($models->currentPage() == $i)
				{{ $i }}
			@else
				<a href="{{ $models->url($i) }}">{{ $i }}</a>
			@endif
		@endfor

		@if ($models->hasMorePages())
			<a href="{{ $models->nextPageUrl() }}">&raquo;</a>
		@endif
	</div>
@endif
