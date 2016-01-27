@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-mg-10">
<div class="panel panel-default">
<div class="panel-heading">Users</div>
@if(Session::has('message'))
	<p class="alert alert-success"> {{Session::get('message')}}</p>
@endif
	<p>
		<a class="btn btn-info" href="{{ route('admin.role_details.store') }}" role="button">Guardar</a>
	</p>	
	
<div class="panel-body">
	{!!Form::open(['route' => 'admin.role_details.store', 'method' => 'post'])!!}
		@include('admin.role_details.partials.table')
		<input type="hidden" name="role-id" value="{{$data['role']->id}}">
		<button type="submit" class="btn btn-default">Create rate</button>
	{!!Form::close() !!}
</div>
</div>
</div>
</div>
</div>
{!!Form::open( ['route' => ['admin.role_details.destroy', ':PERSON_ID'], 'method' => 'delete', 'id'=>'form-delete'])!!}
{!!Form::close()!!}

@endsection

@include('commonscripts')
@include('menu')