@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit {{$rate->name}}</div>
<div class="panel-body">
@include('admin.rate.partials.messages')

{!!Form::model($rate, ['route' => ['admin.rate.update', $rate], 'method' => 'put'])!!}
		  @include('admin.rate.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.rate.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.rate.partials.scripts')
@include('commonscripts')
@include('menu')


