@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New facilities</div>
			<div class="panel-body">
			
			@include('admin.facilities.partials.messages')
			
			{!!Form::open(['route' => 'admin.facilities.store', 'method' => 'post'])!!}
					 
					 @include('admin.facilities.partials.fields')
					  <button type="submit" class="btn btn-default">Create facilities</button>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@include('admin.facilities.partials.scripts')
@include('menu')