@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit service_plans {{$service_plan->name}}</div>
<div class="panel-body">
@include('admin.service_plans.partials.messages')

{!!Form::model($service_plan, ['route' => ['admin.service_plans.update', $service_plan], 'method' => 'put'])!!}
		  @include('admin.service_plans.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update service_plans</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.service_plans.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.service_plans.partials.scripts')
@include('commonscripts')
@include('menu')


