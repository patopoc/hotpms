@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit facilities {{$facility->name}}</div>
<div class="panel-body">
@include('admin.facilities.partials.messages')

{!!Form::model($facility, ['route' => ['admin.facilities.update', $facility], 'method' => 'put'])!!}
		  @include('admin.facilities.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update facilities</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.facilities.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.facilities.partials.scripts')
@include('commonscripts')



