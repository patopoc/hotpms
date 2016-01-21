@section('scripts')
<script type="text/javascript">

$(document).ready(function(){

var facilityCounter = $("#facilities_container").children().length - 1;
console.log(facilityCounter);

addFacility= function(el){
	console.log(facilityCounter + "facility: " + el.name.split("service")[1]);
	if(el.name.split("facility")[1] >= facilityCounter){
		facilityCounter++;
		var selectElem='{!! Form::select("serv",  $data["facilities"], null, ["class" => "form-control", "placeholder" => "Select Facility" ,"onchange"=>"addFacility(this);"]) !!}';
		selectElem= selectElem.replace('serv','facility' + facilityCounter);
		
		$("#facilities_container").append('<div class="form-group">' + selectElem + "</div>");	
	}
};

});

</script>
@endsection
