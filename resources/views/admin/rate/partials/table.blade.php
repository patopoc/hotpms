<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Week Day Price</th>
			<th>Week End Price</th>
			
		</tr>
				
		@foreach ($rates as $rate)
		<tr data-id="{{$rate->id}}">
			<td> {{$rate->name or ''}}</td>
			<td> {{$rate->weekday_price or ''}}</td>
			<td> {{$rate->weekend_price or ''}}</td>
			<td>
				<a href="{{ route('admin.rate.edit', $rate) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>	
		@endforeach
				
	</table>