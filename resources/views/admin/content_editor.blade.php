<div class="form-group">
	{!! Form::label('content', $model->trans('content')) !!}
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
	<div class="js-content-containers top-10">
		<div class="content-editor fake-hidden" data-tab-id="0">
			<pre id="js-content-editor">{{ $model->content }}</pre>
			{!! Form::textarea('content', $model->content, ['class' => 'hidden js-content']) !!}
		</div>
		<div class="js-content-preview content-editor-preview fake-hidden" data-tab-id="1"></div>
	</div>
</div>
