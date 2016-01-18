<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>CI</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Accion</th>
		</tr>
				
		@foreach ($people as $person)
		<tr data-id="{{$person->id}}">
			<td> {{$person->id}}</td>
			<td> {{$person->ci}}</td>
			<td> {{$person->name}}</td>
			<td> {{$person->last_name}}</td>
			<td>
				<a href="{{ route('admin.people.edit', $person) }}">Editar</a>
				<a href="#" class="btn-delete">Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>