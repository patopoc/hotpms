<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Size</th>
			<th>Property</th>
			<th>Available</th>
			<th>Actions</th>
			
			
		</tr>
				
		@foreach ($room_types as $room_type)
		<tr data-id="{{$room_type->id}}">
			<td> 
				<p>{{$room_type->name or ''}}</p>
				<a href="#" data-toggle="modal"					
					data-target="#detailModal" 
					data-detail="{{json_encode($room_type->fullData())}}">
					@if($room_type->pictures->count() > 0)
					<i class="fa fa-picture-o"></i>
					@endif
				</a>
			</td>
			<td> {{$room_type->description or ''}}</td>
			<td> {{$room_type->size or ''}}</td>
			<td> {{$room_type->property->name or ''}}</td>
			<td> {{$room_type->available or ''}}</td>
			<td>
				<a href="{{ route('admin.room_types.edit', $room_type) }}" class='btn btn-warning btn-sm' role='button'><span class="glyphicon glyphicon-pencil"></span></a>
				<a href="#" class="btn-delete btn btn-danger btn-sm" role='button'><span class="glyphicon glyphicon-minus-sign"></span></a>
			</td>
		</tr>	
		
		@endforeach
				
	</table>