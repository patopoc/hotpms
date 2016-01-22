
<div class="form-group">
 	{!! Form::label('date', 'Date') !!}
 	{!! Form::text('date', "hoy", ['class' => 'form-control', 'readonly' => true]) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_property', 'Pais') !!}
 	@if(isset($data['booking']))
 		{!! Form::select('id_property', $data["properties"], $data['booking']->id_property, ['class' => 'form-control', 'placeholder' => 'Select Property']) !!}
 	@else
 		{!! Form::select('id_property', $data["properties"], null, ['class' => 'form-control', 'placeholder' => 'Select Property']) !!}	 	
    @endif
</div>
<div class="form-group">
 	{!! Form::label('id_user', 'Nombre') !!}
 	{!! Form::text('id_user', "usuario", ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('ci', 'CI') !!}
 	{!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Enter CI and press Enter']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('name', 'Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>

<div class="form-group">
 	{!! Form::label('last_name', 'Apellido') !!}
 	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('email', 'Email') !!}
 	{!! Form::email('email', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('telephone', 'Telephone') !!}
 	{!! Form::text('telephone', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_country', 'Pais') !!}
 	{!! Form::select('id_country', ['' => 'Select Country'] + $data["countries"], null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
	{!! Form::label('check_in', 'Check In') !!}
	<div class='input-group date' id='check_in'>
	 	{!! Form::text('check_in', null, ['class' => 'form-control']) !!}
	 	<span class="input-group-addon">
        	<span class="glyphicon glyphicon-time"></span>
        </span>
 	</div>	 	
    
</div>
<div class="form-group">
	{!! Form::label('check_out', 'Check Out') !!}
	<div class='input-group date' id='check_out'>
	 	{!! Form::text('check_out', null, ['class' => 'form-control']) !!}
	 	<span class="input-group-addon">
        	<span class="glyphicon glyphicon-time"></span>
        </span>
 	</div>	 	
    
</div>
<div class="form-group">
	{!! Form::label('arrival_time', 'Arrival Time') !!}
	<div class='input-group date' id='checkin-time-picker'>
	 	{!! Form::text('arrival_time', null, ['class' => 'form-control']) !!}
	 	<span class="input-group-addon">
        	<span class="glyphicon glyphicon-time"></span>
        </span>
 	</div>	 	
    
</div>
<div class="form-group">
 	{!! Form::label('comments_and_requests', 'Comments And Requests') !!}
 	{!! Form::textarea('comments_and_requests', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_room_type', 'Pais') !!}
 	{!! Form::select('id_room_type', $data["room_types"], null, ['class' => 'form-control', 'placeholder' => 'Select room type']) !!}	 	    
</div>
<div class="form-group">
 	{!! Form::label('number_of_rooms', 'Rooms') !!}
 	{!! Form::number('number_of_rooms', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('adults', 'Number of Adults') !!}
 	{!! Form::number('adults', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('children', 'Number of Children') !!}
 	{!! Form::number('children', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>

<div class="form-group">
 	{!! Form::label('pets', 'Number of Pets') !!}
 	{!! Form::number('pets', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('rate_plan', 'Rate Plan') !!}
 	{!! Form::select('rate_plan', $data["rate_plans"], null, ['class' => 'form-control', 'placeholder' => 'Select room type']) !!}	 	    
</div>