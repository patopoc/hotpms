@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit {{$data['facility_plan']->name}}</div>
<div class="panel-body">
@include('admin.facility_plans.partials.messages')

{!!Form::open(['route' => ['admin.facility_plans.update', $data['facility_plan']->id], 'method' => 'put'])!!}
		  
		  @include('admin.facility_plans.partials.fields')	
		  @include('admin.facility_plans.partials.scripts')	   
		 
		  <button type="submit" class="btn btn-default">Update</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.facility_plans.partials.delete')

</div>
</div>
</div>
@endsection

@include('commonscripts')
@include('menu')


