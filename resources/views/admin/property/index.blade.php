@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-mg-10">
<div class="panel panel-default">
<div class="panel-heading">Properties</div>
@if(Session::has('message'))
	<p class="alert alert-success"> {{Session::get('message')}}</p>
@endif
	<p>
		<a class="btn btn-info" href="{{ route('admin.property.create') }}" role="button">New</a>
	</p>	
	
<div class="panel-body">
	
	@include('admin.property.partials.table')
	
	
</div>
</div>
</div>
</div>
</div>
{!!Form::open( ['route' => ['admin.property.destroy', ':PERSON_ID'], 'method' => 'delete', 'id'=>'form-delete'])!!}
{!!Form::close()!!}

@endsection

@include('commonscripts')
@include('admin.people.partials.scripts')
@include('menu')