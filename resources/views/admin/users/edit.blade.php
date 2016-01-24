@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit user {{$data['user']->username}}</div>
<div class="panel-body">
@include('admin.users.partials.messages')

{!!Form::model($data['user'], ['route' => ['admin.users.update', $data['user']], 'method' => 'put'])!!}
		  @include('admin.users.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update user</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.users.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.users.partials.scripts')
@include('commonscripts')



