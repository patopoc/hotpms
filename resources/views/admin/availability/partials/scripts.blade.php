@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
	"use strict";

	var route= "{{route('availabilityList')}}";
    route= route.replace("%7BfromDate%7D","{{$data['fromDate']}}");
    route= route.replace("%7BtoDate%7D","{{$data['toDate']}}");
    //console.log("route: " + route);
	// $.get(route, function(data){
	//	console.log(data);
    //});
    $(".gantt").gantt({
        source: route,
        navigate: "scroll",
        scale: "days",
        maxScale: "days",
        minScale: "days",
        itemsPerPage: 10,
        useCookie: true,
        onItemClick: function(data) {
            //alert("Item clicked - show some details");
        },
        onAddClick: function(dt, rowId) {
           // alert("Empty space clicked - add an item! " + dt + "||" + rowId);
        },
        onRender: function() {
            if (window.console && typeof console.log === "function") {
                console.log("chart rendered");
            }
        }
    });

    $(".gantt").popover({
        selector: ".bar",
        title: "I'm a popover",
        content: "And I'm the content of said popover.",
        trigger: "hover"
    });

    $('#from_date').datetimepicker({
		format: 'YYYY-MM-DD'
	});
	$('#to_date').datetimepicker({
		format: 'YYYY-MM-DD'
	});
	
	
});
</script>
@endsection
