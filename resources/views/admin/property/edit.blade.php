@extends('app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit Person {{$data["person"]->name}}</div>
<div class="panel-body">
@include('admin.people.partials.messages')

{!!Form::model($data["person"], ['route' => ['admin.people.update', $data["person"]], 'method' => 'put'])!!}
		  @include('admin.people.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update Person</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.people.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.people.partials.scripts')



