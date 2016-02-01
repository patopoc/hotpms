@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">New Person</div>
<div class="panel-body">

@include('admin.people.partials.messages')

{!!Form::open(['route' => 'admin.people.store', 'method' => 'post'])!!}
		 @include('admin.people.partials.scripts')
		 @include('admin.people.partials.fields')
		  <button type="submit" class="btn btn-default">Create</button>
	{!!Form::close()!!}
</div>
</div>
</div>
</div>
</div>
@endsection
@include('menu')