@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Facility Plan</div>
			<div class="panel-body">
			
			@include('admin.facility_plans.partials.messages')
			
			{!!Form::open(['route' => 'admin.facility_plans.store', 'method' => 'post'])!!}
					@include('admin.facility_plans.partials.fields')
					@include('admin.facility_plans.partials.scripts')
					<button type="submit" class="btn btn-default">Create</button>
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection


@include('menu')
@include('commonscripts')