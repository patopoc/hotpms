@section('scripts')
<div class="modal fade" id="create-booking-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Available Date</h4>
      </div>
      <div class="modal-body" id="create-booking-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="booking-ok" class="btn btn-primary">Ok</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

$(document).ready(function(){
	"use strict";

	var route= "{{route('availabilityList')}}";
    route= route.replace("%7BfromDate%7D","{{$data['fromDate']}}");
    route= route.replace("%7BtoDate%7D","{{$data['toDate']}}");
    //
    console.log("route: " + route);
	 $.get(route, function(data){
		console.log(data);
    });
    /**/
    
    /**/
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
           var cellDate= moment(dt).format("YYYY-MM-DD"); 
           /*$("#book-confirmation").dialog({
				 resizable: false,
				 height:140,
				 modal: true,
				 buttons: {
					  Ok: function() {
							window.location.replace("{{route('admin.booking.create')}}?date=" + cellDate + "&room=" + rowId);
					 },
					 Cancel: function() {
						 $( this ).dialog( "close" );
						 
					 }
				 }
			});*/
			
			$("#create-booking-body p").text('Do you want to make a booking for the '+ cellDate +' ?');			
			$('#create-booking-modal').modal('show');
			$('#booking-ok').click(function(){
				window.location.replace("{{route('admin.booking.create')}}?date=" + cellDate + "&room=" + rowId);
			});
			
        },
        onRender: function() {
            if (window.console && typeof console.log === "function") {
                console.log("chart rendered");
            }
        }
    });

    $(".gantt").popover({
        selector: ".bar",
        title: "Client",
        content: "",
        trigger: "hover"
    });

    $('#from_date').datetimepicker({
		format: 'YYYY-MM-DD'
	});
	$('#to_date').datetimepicker({
		format: 'YYYY-MM-DD'
	});
	
	/**/
});
</script>
@endsection
