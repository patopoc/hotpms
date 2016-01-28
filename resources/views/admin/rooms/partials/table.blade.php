<table class="table table-striped">
		<tr>
			<th>Property</th>
			<th>Room Type</th>
			<th>Total</th>
			<th>Booked</th>
			
			
		</tr>
				
		@foreach ($rooms as $room)
		<tr data-id="{{$room->id}}">
			<td> {{$room->property->name or ''}}</td>
			<td> {{$room->roomType->name or ''}}</td>
			<td> {{$room->total or ''}}</td>
			<td> {{$room->booked or ''}}</td>
			<td>
				<a href="{{ route('admin.rooms.edit', $room) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>