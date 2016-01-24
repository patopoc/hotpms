<table class="table table-striped">
		<tr>
			<th>User</th>
			<th>Name</th>			
			<th>Property</th>
			<th>Role</th>			
		</tr>
				
		@foreach ($users as $user)
		<tr data-id="{{$user->id}}">
			<td> {{$user->username or ''}}</td>
			<td> {{$user->person->name or ''}}</td>
			<td> {{$user->property->name or ''}}</td>
			<td> {{$user->role->name or ''}}</td>
			<td>
				<a href="{{route('admin.users.edit', $user)}}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>