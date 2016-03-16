@if (session('generated_url') !== null)
<div class="alert alert-danger" role="alert">.

	<p> Short Url: </p>	
	<ul>
		
			<li>{{session('generated_url')}}</li>
		
	</ul>
</div>
@endif
