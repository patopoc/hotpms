<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Actions</th>			
			
		</tr>
				
		@foreach ($facility_plans as $facility_plan)
		<tr data-id="{{$facility_plan->id}}">
			<td> 
				<p><b>{{$facility_plan->name or ''}}</b></p>
					@foreach($facility_plan->facilities as $facility)
						<p> - {{$facility->name or ''}}</p>							
					@endforeach
			</td>
			<td>
				<a href="{{ route('admin.facility_plans.edit', $facility_plan) }}" class='btn btn-warning btn-sm' role='button'><span class="glyphicon glyphicon-pencil"></span></a>
				<a href="#" class="btn-delete btn btn-danger btn-sm" role='button'><span class="glyphicon glyphicon-minus-sign"></span></a>
			</td>			
		</tr>			
		@endforeach
				
	</table>