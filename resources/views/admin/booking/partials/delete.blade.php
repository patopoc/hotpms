{!!Form::open( ['route' => ['admin.booking.destroy', $data["person"]->id], 'method' => 'delete', 
				'id' => 'form-delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete User</button>
		  <a class="btn btn-info" href="{{ route('admin.booking.index') }}" role="button">Cancel</a>
		  
{!!Form::close()!!}

