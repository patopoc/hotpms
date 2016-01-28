<div id="confirm-delete"></div>

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
	var jsonDates= "{{$data['disabledDates']}}";
	jsonDates= jsonDates.replace(/&quot;/g, "\"");
	
	var disDates= $.parseJSON(jsonDates);
	$('#check_in').datetimepicker({
		format: 'YYYY/MM/DD',
		disabledDates: disDates
	});
	$('#check_out').datetimepicker({
		format: 'YYYY/MM/DD',
		disabledDates: disDates
	});
	
	$('#arrival_time').datetimepicker({
		format:'LT'
	});
	
    $("#ci").focusout(function(){
        var route= "{{route('peopleSearch')}}";
        route= route.replace("%7Bci%7D",$(this).val());
        console.log("route: " + route);
		$.get(route, function(data){
			console.log(data);
			if(data !== null && data !==''){
				var person= $.parseJSON(data);
				$("#name").val(person.name).attr("readonly",true);
				$("#last_name").val(person.last_name).attr("readonly",true);
				$("#email").val(person.email).attr("readonly",true);
				$("#telephone").val(person.telephone).attr("readonly",true);
				$("#id_country").val(person.id_country).attr("readonly",true);
			}
			
		});
    });
});
</script>
@endsection
