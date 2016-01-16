@extends('app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Users</div>
@if(Session::has('message'))
	<p class="alert alert-success"> {{Session::get('message')}}</p>
@endif
	<p>
		<a class="btn btn-info" href="{{ route('admin.people.create') }}" role="button">Link</a>
	</p>	
	
<div class="panel-body">
	
	@include('admin.people.partials.table')
	
	
</div>
</div>
</div>
</div>
</div>
{{Form::open( ['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'delete', 'id'=>'form-delete'])!!}
{{Form::close()!!}
@endsection


@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	$('.btn-delete').click(function(e){
		var row= $(this).parents('tr');
		var id= row.data('id');
		var form= $('#form-delete');		
		var url= form.attr('action').replace(':USER_ID', id);
		var data= form.serialize();

		
		$.post(url, data, function(result){
			alert(result);
			row.fadeOut();
		}).fail(function(){
			alert("no se borro usuario")});			
		});
});

</script>
@endsection
