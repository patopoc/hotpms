<table class="table table-striped">
		<tr>
			<th>Role</th>			
			
		</tr>
				
		@foreach ($roles as $role)
		<tr data-id="{{$role->id}}">
			<td> {{$role->name or ''}}</td>
			<td>
				<a href="{{ route('admin.role_details.show', $role->id) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>
		@endforeach
				
	</table>