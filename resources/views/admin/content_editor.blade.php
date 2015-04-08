<ul class="nav nav-tabs js-content-tabs">
	<li data-tab-id="0">
		<a href="#">
			<span class="glyphicon glyphicon-edit"></span>
			{{ trans('admin.edit') }}
		</a>
	</li>
	<li data-tab-id="1">
		<a href="#">
			<span class="glyphicon glyphicon-eye-open"></span>
			{{ trans('admin.preview') }}
		</a>
	</li>
</ul>
<hr>

<div class="js-content-containers">
	<div class="hidden" data-tab-id="0">
		{!! Form::textarea('content', $model->content, ['class' => 'form-control js-content']) !!}
	</div>
	<div class="js-content-preview hidden" data-tab-id="1"></div>
</div>
