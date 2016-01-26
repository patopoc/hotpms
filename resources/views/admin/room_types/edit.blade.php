@extends('main')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit bed_types {{$bed_type->type}}</div>
<div class="panel-body">
@include('admin.bed_types.partials.messages')

{!!Form::model($bed_type, ['route' => ['admin.bed_types.update', $bed_type], 'method' => 'put'])!!}
		  @include('admin.bed_types.partials.fields')	 
		 
		  <button type="submit" class="btn btn-default">Update bed_types</button>
{!!Form::close()!!}


</div>
</div>
@include('admin.bed_types.partials.delete')

</div>
</div>
</div>
@endsection

@include('admin.bed_types.partials.scripts')
@include('commonscripts')
@include('menu')


