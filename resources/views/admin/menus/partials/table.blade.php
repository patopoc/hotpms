<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Price</th>
			
		</tr>
		@foreach($menu as $menuSection)
		<tr>
			<td>
				
            	<a href="#"><i class="fa {{$menuSection['section']->icon}} fa-fw"></i> {{$menuSection['section']->description}}<span class="fa arrow"></span></a>
                	<table class="table table-striped">
                	@foreach($menuSection['items'] as $menuItem)
	                	<tr>
	                    	<td>
	                        	<a href="#"><i class="fa {{$menuItem->icon}}  fa-fw"></i>{{$menuItem->description}}</a>
	                        </td>
	                        <td>
								<a href="{{ route('admin.menus.edit', $menuItem->id) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
								<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
							</td>
	                   </tr>
                    @endforeach
                    </table>
                
            </td>
            <td>
				<a href="{{ route('admin.menus.edit', $menuSection['section']->id) }}"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
				<a href="#" class="btn-delete"><span class="glyphicon glyphicon-minus-sign"></span>Eliminar</a>
			</td>
		</tr>					
		@endforeach	
				
	</table>