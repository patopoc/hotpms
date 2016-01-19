<div id="confirm-delete"></div>

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
	var row=null;
	var id = null;
	var form = null;
	var url = null;
	var data=null;
	$('.btn-delete').click(function(e){
		row= $(this).parents('tr');
		id= row.data('id');
		form= $('#form-delete');
		url= form.attr('action').replace(':PERSON_ID', id);
		data= form.serialize();	
		$.fn.confirmDelete();
			
	});
	
	$('#form-delete').submit(function(e){
		e.preventDefault();
		$.fn.confirmDelete();
	});
	
	$.fn.confirmDelete=function (){
		 $( "#confirm-delete" ).dialog({
			 resizable: false,
			 height:140,
			 modal: true,
			 buttons: {
				  Ok: function() {
					if(url !== null){
						$.post(url, data, function(result){
							
							row.fadeOut();
						}).fail(function(){
							alert("no se borro usuario");
						});
						 $( this ).dialog( "close" );
					}
					else if($("#form-delete") !== null){
						$("#form-delete")[0].submit();						
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
