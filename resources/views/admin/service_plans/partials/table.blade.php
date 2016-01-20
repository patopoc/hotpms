<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Price</th>
			
		</tr>
				
		@foreach ($service_plans as $service_plan)
		<tr data-id="{{$service_plan->id}}">
			<td> {{$service_plan->name or ''}}</td>
			<td>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>
			@foreach($service_plan->services as $service)
				<tr data-id="{{$service->id}}">
					<td> {{$service->name or ''}}</td>
					<td>						
						<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
					</td>
				</tr>
			
			@endforeach	
		@endforeach
				
	</table>