
<div class="form-group">
 	{!! Form::label('id_property', 'Property') !!}
 	{!! Form::select('id_property', $data["properties"], null, ['class' => 'form-control', 'placeholder' => 'Select Property']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('room_type', 'Room Type') !!}
 	{!! Form::select('room_type', $data["roomTypes"], null, ['class' => 'form-control', 'placeholder' => 'Select Room Type']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('total', 'Total of Rooms') !!}
 	{!! Form::number('total', null, ['class' => 'form-control']) !!}	 	
    
</div>
