<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Size</th>
			<th>Property</th>
			<th>Available</th>
			<th>Action</th>
			
			
		</tr>
				
		@foreach ($room_types as $room_type)
		<tr data-id="{{$room_type->id}}">
			<td> {{$room_type->name or ''}}</td>
			<td> {{$room_type->description or ''}}</td>
			<td> {{$room_type->size or ''}}</td>
			<td> {{$room_type->property->name or ''}}</td>
			<td> {{$room_type->available or ''}}</td>
			<td>
				<a href="{{ route('admin.room_types.edit', $room_type) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		<tr>
			@foreach($room_type->pictures as $picture)
				<td>
					<img src="{{asset($picture->url)}}" >
				</td>
			@endforeach
		</tr>
		@endforeach
				
	</table>