@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit rooms {{$data['room']->id}}</div>
<div class="panel-body">
@include('admin.rooms.partials.messages')

{!!Form::model($data['room'], ['route' => ['admin.rooms.update', $data['room'], 'method' => 'put'])!!}
		  @include('admin.rooms.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update rooms</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.rooms.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.rooms.partials.scripts')
@include('commonscripts')
@include('menu')


