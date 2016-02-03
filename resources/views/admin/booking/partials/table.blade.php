@if(isset($data))
	<h3>Today Arrivals</h3>
@endif
<table class="table table-striped">
		<tr>
			<th>Reference</th>
			<th>Name</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Nights</th>
			<th>Nr. Rooms</th>
			<th>Room</th>
			<th>Adults</th>
			<th>Children</th>
			<th>Total Price</th>
			<th>Actions</th>
		</tr>
		@if(isset($data))		
			@foreach ($data['today'] as $booking)
				<tr data-id="{{$booking->id}}">
					<td> {{$booking->reference_code or ''}}</td>
					<td> {{$booking->personData->full_name or ''}}</td>
					<td> {{$booking->check_in or ''}}</td>
					<td> {{$booking->arrival_time or ''}}</td>
					<td> {{$booking->number_of_days or ''}}</td>
					<td> {{$booking->number_of_rooms or ''}}</td>
					<td> {{$booking->roomType->id or ''}}</td>			
					<td> {{$booking->adults or ''}}</td>
					<td> {{$booking->children or ''}}</td>
					<td> {{$booking->total_price}}</td>
					<td>
						<a href="{{route('admin.booking.edit', $booking->id)}}" class='btn btn-warning btn-sm' role='button'><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="#" class="btn-delete btn btn-danger btn-sm" role='button'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</td>
				</tr>	
			@endforeach
		@else
			@foreach ($bookings as $booking)
				<tr data-id="{{$booking->id}}">
					<td> {{$booking->reference_code or ''}}</td>
					<td> {{$booking->personData->name or ''}}</td>
					<td> {{$booking->check_in or ''}}</td>
					<td> {{$booking->arrival_time or ''}}</td>
					<td> {{$booking->number_of_days or ''}}</td>
					<td> {{$booking->number_of_rooms or ''}}</td>
					<td> {{$booking->roomType->id or ''}}</td>			
					<td> {{$booking->adults or ''}}</td>
					<td> {{$booking->children or ''}}</td>
					<td> {{$booking->total_price}}</td>
					<td>
						<a href="{{route('admin.booking.edit', $booking->id)}}" class='btn btn-warning btn-sm' role='button'><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="#" class="btn-delete btn btn-danger btn-sm" role='button'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</td>
				</tr>	
			@endforeach
		@endif
				
</table>

@if(isset($data))	
<h3>Tomorrow Arrivals</h3>
<table class="table table-striped">
		<tr>
			<th>Reference</th>
			<th>Name</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Nights</th>
			<th>Nr. Rooms</th>
			<th>Room</th>
			<th>Adults</th>
			<th>Children</th>
			<th>Total Price</th>
		</tr>
	@foreach ($data['tomorrow'] as $booking)
		<tr data-id="{{$booking->id}}">
			<td> {{$booking->reference_code or ''}}</td>
			<td> {{$booking->personData->name or ''}}</td>
			<td> {{$booking->check_in or ''}}</td>
			<td> {{$booking->arrival_time or ''}}</td>
			<td> {{$booking->number_of_days or ''}}</td>
			<td> {{$booking->number_of_rooms or ''}}</td>
			<td> {{$booking->roomType->id or ''}}</td>			
			<td> {{$booking->adults or ''}}</td>
			<td> {{$booking->children or ''}}</td>
			<td> {{$booking->total_price}}</td>
			<td>
				<a href="#"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
	@endforeach	
				
</table>
@endif