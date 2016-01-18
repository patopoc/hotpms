{!!Form::open( ['route' => ['admin.people.destroy', $person->id], 'method' => 'delete', 
				'id' => 'form-delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete User</button>
		  <a class="btn btn-info" href="{{ route('admin.people.index') }}" role="button">Cancel</a>
		  
{!!Form::close()!!}

