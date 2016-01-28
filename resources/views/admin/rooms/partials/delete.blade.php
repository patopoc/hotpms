{!!Form::open( ['route' => ['admin.rooms.destroy', $room->id], 'method' => 'delete', 
				'id' => 'form-delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete bed_type</button>
		  <a class="btn btn-info" href="{{ route('admin.rooms.index') }}" role="button">Cancel</a>
		  
{!!Form::close()!!}

