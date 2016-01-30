@section('scripts')
<script type="text/javascript">

$(document).ready(function(){

var serviceCounter=0;	

addService= function(el){

	var elName= el.name.split('service');
	if(elName[1] >= serviceCounter){
		serviceCounter++;
		var selectElem='{!! Form::select("serv", ["" => "Select a Service"] + $services, null, ["class" => "form-control", "onchange"=>"addService(this);"]) !!}';
		selectElem= selectElem.replace('serv','service' + serviceCounter);
		
		$("#services_container").append('<div class="form-group">' + selectElem + "</div>");	
	}
};

});

</script>
@endsection
