@if ($errors->any())
<div class="alert alert-danger" role="alert">.

	<p> Please verify the message bellow: </p>	
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
