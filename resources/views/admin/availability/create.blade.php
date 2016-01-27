@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New rate</div>
			<div class="panel-body">
			
			@include('admin.rate.partials.messages')
			
			{!!Form::open(['route' => 'admin.rate.store', 'method' => 'post'])!!}
					 
					 @include('admin.rate.partials.fields')
					  <button type="submit" class="btn btn-default">Create rate</button>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@include('admin.rate.partials.scripts')
@include('menu')