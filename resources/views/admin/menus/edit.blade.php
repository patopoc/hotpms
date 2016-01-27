@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit Menu Item {{$data['menuItem']->name}}</div>
<div class="panel-body">
@include('admin.menus.partials.messages')

{!!Form::model($data['menuItem'], ['route' => ['admin.menus.update', $data['menuItem']], 'method' => 'put'])!!}
		  @include('admin.menus.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update services</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.menus.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.menus.partials.scripts')
@include('commonscripts')
@include('menu')


