{!!Form::open( ['route' => ['admin.bed_types.destroy', $bed_type->id], 'method' => 'delete', 
				'id' => 'form-delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete bed_type</button>
		  <a class="btn btn-info" href="{{ route('admin.bed_types.index') }}" role="button">Cancel</a>
		  
{!!Form::close()!!}

