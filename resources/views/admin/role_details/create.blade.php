@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Service Plan</div>
			<div class="panel-body">
			
			@include('admin.facility_plans.partials.messages')
			
			{!!Form::open(['route' => 'admin.role_details.store', 'method' => 'post'])!!}
					@include('admin.role_details.partials.fields')
					@include('admin.role_details.partials.scripts')
					<button type="submit" class="btn btn-default">Create Service Plan</button>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@include('main')
