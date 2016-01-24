@if(isset($data))
	<h3>Today Arrivals</h3>
@endif
<table class="table table-striped">
		<tr>
			<th>Referencia</th>
			<th>Nombre</th>
			<th>Fecha de LLegada</th>
			<th>Hora de LLegada</th>
			<th>Noches</th>
			<th>No Habitaciones</th>
			<th>Typo de Habitacion</th>
			<th>Adultos</th>
			<th>Ninios</th>
			<th>Precio Total</th>
		</tr>
		@if(isset($data))		
			@foreach ($data['today'] as $booking)
				<tr data-id="{{$booking->id}}">
					<td> {{$booking->reference_code or ''}}</td>
					<td> {{$booking->personData->name or ''}}</td>
					<td> {{$booking->check_in or ''}}</td>
					<td> {{$booking->arrival_time or ''}}</td>
					<td> </td>
					<td> {{$booking->number_of_rooms or ''}}</td>
					<td> {{$booking->roomType->id or ''}}</td>			
					<td> {{$booking->adults or ''}}</td>
					<td> {{$booking->children or ''}}</td>
					<td> </td>
					<td>
						<a href="#"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
						<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
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
					<td> </td>
					<td> {{$booking->number_of_rooms or ''}}</td>
					<td> {{$booking->roomType->id or ''}}</td>			
					<td> {{$booking->adults or ''}}</td>
					<td> {{$booking->children or ''}}</td>
					<td> </td>
					<td>
						<a href="#"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
						<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
					</td>
				</tr>	
			@endforeach
		@endif
				
</table>

@if(isset($data))	
<h3>Tomorrow Arrivals</h3>
<table class="table table-striped">
		<tr>
			<th>Referencia</th>
			<th>Nombre</th>
			<th>Fecha de LLegada</th>
			<th>Hora de LLegada</th>
			<th>Noches</th>
			<th>No Habitaciones</th>
			<th>Typo de Habitacion</th>
			<th>Adultos</th>
			<th>Ninios</th>
			<th>Precio Total</th>
		</tr>
	@foreach ($data['tomorrow'] as $booking)
		<tr data-id="{{$booking->id}}">
			<td> {{$booking->reference_code or ''}}</td>
			<td> {{$booking->personData->name or ''}}</td>
			<td> {{$booking->check_in or ''}}</td>
			<td> {{$booking->arrival_time or ''}}</td>
			<td> </td>
			<td> {{$booking->number_of_rooms or ''}}</td>
			<td> {{$booking->roomType->id or ''}}</td>			
			<td> {{$booking->adults or ''}}</td>
			<td> {{$booking->children or ''}}</td>
			<td> </td>
			<td>
				<a href="#"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
	@endforeach	
				
</table>
@endif