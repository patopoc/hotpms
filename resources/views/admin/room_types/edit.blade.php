@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit rooms {{$room->type}}</div>
<div class="panel-body">
@include('admin.room_types.partials.messages')

{!!Form::model($room, ['route' => ['admin.room_types.update', $room], 'method' => 'put'])!!}
		  @include('admin.room_types.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update rooms</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.room_types.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.room_types.partials.scripts')
@include('commonscripts')
@include('menu')


