@extends('main')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Rooms Availability</div>
@include('alert')
		
	
<div class="panel-body">
	
	{!!Form::open(['route' => 'admin.availability.index', 'method' => 'get'])!!}
	<div class="form-group">
	{!! Form::label('from_date', 'From Date') !!}
	<div class='input-group date' id='from_date'>
	 	{!! Form::text('from_date', $data['fromDate'], ['class' => 'form-control']) !!}
	 	<span class="input-group-addon">
        	<span class="glyphicon glyphicon-time"></span>
        </span>
 	</div>	 	
    
    <div id="book-confirmation"></div>
	</div>
	<div class="form-group">
	{!! Form::label('to_date', 'To Date') !!}
	<div class='input-group date' id='to_date'>
	 	{!! Form::text('to_date', $data['toDate'], ['class' => 'form-control']) !!}
	 	<span class="input-group-addon">
        	<span class="glyphicon glyphicon-time"></span>
        </span>
 	</div>	 
 	<br>	
 	<button type="submit" class="btn btn-info">Look Availability</button>
    {!! Form::close() !!}
    
	<div class="gantt"></div>	
	
</div>
</div>
</div>
</div>
{!!Form::open( ['route' => ['admin.availability.destroy', ':PERSON_ID'], 'method' => 'delete', 'id'=>'form-delete'])!!}
{!!Form::close()!!}

@endsection

@include('admin.availability.partials.scripts')
@include('commonscripts')
@include('menu')