<table class="table table-striped">
		<tr>
			<th>Bed Types</th>
			
			
		</tr>
				
		@foreach ($bed_types as $bed_type)
		<tr data-id="{{$bed_type->id}}">
			<td> {{$bed_type->type or ''}}</td>
			<td>
				<a href="{{ route('admin.bed_types.edit', $bed_type) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>