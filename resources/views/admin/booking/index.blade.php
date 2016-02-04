@extends('main')

@section('content')
<!-- div class="container"-->
<div class="row">
<div class="col-lg-11">
<div class="panel panel-default">
<div class="panel-heading">Bookings</div>
@include('alert')
		
	
<div class="panel-body">
	<p>
		<a class="btn btn-info" href="{{ route('admin.booking.create') }}" role="button">New</a>
	</p>
	@include('admin.booking.partials.table')
	
	
</div>
</div>
</div>
</div>
<!-- /div-->
{!!Form::open( ['route' => ['admin.booking.destroy', ':PERSON_ID'], 'method' => 'delete', 'id'=>'form-delete'])!!}
{!!Form::close()!!}

@endsection
@include('commonscripts')
@include('menu')