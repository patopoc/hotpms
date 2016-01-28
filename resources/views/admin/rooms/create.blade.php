@extends('main')

@section('content')
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Room</div>
			<div class="panel-body">
			
			@include('admin.rooms.partials.messages')
			
			{!!Form::open(['route' => 'admin.rooms.store', 'method' => 'post'])!!}
					 
					 @include('admin.rooms.partials.fields')
					  <button type="submit" class="btn btn-default">Create rooms</button>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@include('admin.rooms.partials.scripts')
@include('menu')