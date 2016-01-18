<div id="confirm-delete"></div>

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
	$('.btn-delete').click(function(e){
		var row= $(this).parents('tr');
		var id= row.data('id');
		var form= $('#form-delete');
		var url= form.attr('action').replace(':PERSON_ID', id);
		var data= form.serialize();		
	});
	
	$('#form-delete').submit(function(e){
		e.preventDefault();
		return $.fn.confirmDelete();
	});
	
	$.fn.confirmDelete=function (){
		 $( "#confirm-delete" ).dialog({
			 resizable: false,
			 height:140,
			 modal: true,
			 buttons: {
				  Ok: function() {
					if(typeof url !== 'undefined'){
						$.post(url, data, function(result){
							alert(result);
							row.fadeOut();
						}).fail(function(){
							alert("no se borro usuario");
						});
					}
					else{
						return true;
					}
				 },
				 Cancel: function() {
				 $( this ).dialog( "close" );
				 }
			 }
		});
	} 

});
</script>
@endsection
