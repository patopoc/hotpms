<div id="confirm-delete"></div>

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
    $("#ci").focusout(function(){
        var route= "{{route('peopleSearch')}}";
        route= route.replace("%7Bci%7D",$(this).val());
        console.log("route: " + route);
		$.get(route, function(data){
			var person= $.parseJSON(data);
			$("#name").val(person.name).attr("readonly",true);
			$("#last_name").val(person.last_name).attr("readonly",true);
			
		});
    });
});
</script>
@endsection
