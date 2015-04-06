@if (Session::has('message.text') && Session::has('message.type'))
	<p class="alert alert-{{ Session::get('message.type') }}">
		{{ Session::get('message.text') }}
	</p>
@endif
