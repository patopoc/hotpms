<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Price</th>
			
		</tr>
				
		@foreach ($services as $service)
		<tr data-id="{{$service->id}}">
			<td> {{$service->name or ''}}</td>
			<td> {{$service->price or ''}}</td>			
			<td>
				<a href="{{ route('admin.services.edit', $service) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>