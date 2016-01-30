@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit booking {{$data['booking']->reference_code}}</div>
<div class="panel-body">
@include('admin.booking.partials.messages')

{!!Form::model($data['booking'], ['route' => ['admin.booking.update', $data['booking']], 'method' => 'put'])!!}
		  @include('admin.booking.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update</button>
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


