@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit Property {{$property->name}}</div>
<div class="panel-body">
@include('admin.people.partials.messages')

{!!Form::model($property, ['route' => ['admin.property.update', $property], 'method' => 'put'])!!}
		  @include('admin.property.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update Property</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.property.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.people.partials.scripts')
@include('commonscripts')



