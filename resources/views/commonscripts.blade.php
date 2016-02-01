@section('commonscripts')
<div id="confirm-delete"></div>

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

	var itemCounter = -1;
		
	addItem= function(el, container, jsonValues, namePrefix){
		if(itemCounter == -1)
			itemCounter = $("#" + container).children().length - 2;

		console.log("before add: "+ itemCounter + "item: " + el.name.split(namePrefix)[1]);
		
		if(el.name.split(namePrefix)[1] >= itemCounter){

			$("#form-group" + (itemCounter))
			.append('<a href="#" class="btn-remove-item"><span class="glyphicon glyphicon-minus-sign"></span>Remove</a>');
			
			itemCounter++;
			var selectElem= $('<select id="'+ namePrefix + itemCounter +'" name="'+ namePrefix + itemCounter +'" class="form-control"/>');
									
			var action= 'addItem(this,"' + container + '",' + JSON.stringify(jsonValues) + ',"' + namePrefix+'");'
			selectElem.attr('onchange', action);
			
			$(jsonValues).each(function(key, val){
					
				//console.log(val.key + "=>" +val.val);
				selectElem.append($('<option/>')
						.attr('value', val.key)						
						.text(val.val));	
			});		

			var newFormGroup= $('<div id="form-group' + itemCounter+ '" class="form-group"/>');
			newFormGroup.append(selectElem);
			$("#" + container).append(newFormGroup);	
		}
	};

	$(document).on('click', '.btn-remove-item', function(e){
		$(this).parent().remove();
	});

});
</script>
@endsection