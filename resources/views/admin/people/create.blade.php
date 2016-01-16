@extends('app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">New Users</div>
<div class="panel-body">

@include('admin.people.partials.messages')

{!!Form::open(['route' => 'admin.people.store', 'method' => 'post'])!!}
		 
		 @include('admin.people.partials.fields')
		  <button type="submit" class="btn btn-default">Create User</button>
	{!!Form::close()!!}
</div>
</div>
</div>
</div>
</div>
@endsection
