<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>CI</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Pais</th>
		</tr>
				
		@foreach ($people as $person)
		<tr data-id="{{$person->id}}">
			<td> {{$person->id}}</td>
			<td> {{$person->ci}}</td>
			<td> {{$person->name}}</td>
			<td> {{$person->last_name}}</td>
			<td> {{$person->email}}</td>
			<td> {{$person->telephone}}</td>
			<td> {{$person->country->name or ''}}</td>			
			<td>
				<a href="{{ route('admin.people.edit', $person) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>