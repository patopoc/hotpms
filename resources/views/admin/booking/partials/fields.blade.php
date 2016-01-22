
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