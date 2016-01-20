{!!Form::open( ['route' => ['admin.property.destroy', $property->id], 'method' => 'delete', 
				'id' => 'form-delete'])!!}
	 
		  <button type="submit" class="btn btn-danger">Delete Property</button>
		  <a class="btn btn-info" href="{{ route('admin.property.index') }}" role="button">Cancel</a>
		  
{!!Form::close()!!}

