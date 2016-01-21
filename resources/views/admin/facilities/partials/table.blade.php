<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Description</th>
			
		</tr>
				
		@foreach ($facilities as $facility)
		<tr data-id="{{$facility->id}}">
			<td> {{$facility->name or ''}}</td>
			<td> {{$facility->description or ''}}</td>			
			<td>
				<a href="{{ route('admin.facilities.edit', $facility) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>