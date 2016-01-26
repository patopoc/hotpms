@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit booking {{$booking->type}}</div>
<div class="panel-body">
@include('admin.booking.partials.messages')

{!!Form::model($booking, ['route' => ['admin.booking.update', $booking], 'method' => 'put'])!!}
		  @include('admin.booking.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update booking</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.booking.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.booking.partials.scripts')
@include('commonscripts')
@include('menu')


