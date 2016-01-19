@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Property</div>
			<div class="panel-body">
			
			@include('admin.property.partials.messages')
			
			{!!Form::open(['route' => 'admin.property.store', 'method' => 'post'])!!}
					 
					 @include('admin.property.partials.fields')
					  <button type="submit" class="btn btn-default">Create Property</button>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@include('admin.property.partials.scripts')
