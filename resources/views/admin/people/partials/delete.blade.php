{!!Form::open( ['route' => ['admin.users.destroy', $user->id], 'method' => 'delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete User</button>
{!!Form::close()!!}

