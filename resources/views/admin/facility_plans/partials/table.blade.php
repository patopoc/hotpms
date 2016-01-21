<table class="table table-striped">
		<tr>
			<th>Name</th>			
			
		</tr>
				
		@foreach ($facility_plans as $facility_plan)
		<tr data-id="{{$facility_plan->id}}">
			<td> {{$facility_plan->name or ''}}</td>
			<td>
				<a href="{{ route('admin.facility_plans.edit', $facility_plan) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>
			@foreach($facility_plan->facilities as $facility)
				<tr data-id="{{$facility->id}}">
					<td> {{$facility->name or ''}}</td>
					<td> {{$facility->description or ''}}</td>
					<td>						
						<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
					</td>
				</tr>
			
			@endforeach	
		@endforeach
				
	</table>