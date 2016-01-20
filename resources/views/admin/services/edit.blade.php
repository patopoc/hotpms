@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit services {{$service->name}}</div>
<div class="panel-body">
@include('admin.services.partials.messages')

{!!Form::model($service, ['route' => ['admin.services.update', $service], 'method' => 'put'])!!}
		  @include('admin.services.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update services</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.services.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.services.partials.scripts')
@include('commonscripts')



