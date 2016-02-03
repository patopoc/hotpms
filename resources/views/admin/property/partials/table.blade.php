<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Info</th>
			<th>Address</th>
			<th>Check In Time</th>
			<th>Check Out Time</th>
			<th>Cancelation Policy</th>
			<th>Timezone</th>
			<th>Conditions</th>
			<th>Pet Rules</th>
			<th>Actions</th>
		</tr>
				
		@foreach ($properties as $property)
		<tr data-id="{{$property->id}}">
			<td> {{$property->name or ''}}</td>
			<td> {{$property->info or ''}}</td>
			<td> {{$property->address or ''}}</td>
			<td> {{$property->checkin_time or ''}}</td>
			<td> {{$property->checkout_time or ''}}</td>
			<td> {{$property->cancelation_policy or ''}}</td>
			<td> {{$property->time_zone or ''}}</td>
			<td> {{$property->conditions or ''}}</td>
			<td> {{$property->pet_rules or ''}}</td>			
			<td>
				<a href="{{ route('admin.property.edit', $property) }}" class='btn btn-warning btn-sm' role='button'><span class="glyphicon glyphicon-pencil"></span></a>
				<a href="#" class="btn-delete btn btn-danger btn-sm" role='button'><span class="glyphicon glyphicon-minus-sign"></span></a>
			</td>
		</tr>	
		@endforeach
				
	</table>