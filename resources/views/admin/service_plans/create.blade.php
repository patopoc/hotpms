@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Service Plan</div>
			<div class="panel-body">
			
			@include('admin.service_plans.partials.messages')
			
			{!!Form::open(['route' => 'admin.service_plans.store', 'method' => 'post'])!!}
					 
					 @include('admin.service_plans.partials.fields')
					  <button type="submit" class="btn btn-default">Create Service Plan</button>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@include('admin.service_plans.partials.scripts')
