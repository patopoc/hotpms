<div class="form-group">
 	{!! Form::label('name', 'Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('description', 'Description') !!}
 	{!! Form::text('description', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_service_plan', 'Service Plan') !!}
 	{!! Form::select('id_service_plan', $data["service_plans"], null, ['class' => 'form-control', 'placeholder' => 'Select Service Plan']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_rate', 'Service Plan') !!}
 	{!! Form::select('id_rate', $data["rate"], null, ['class' => 'form-control', 'placeholder' => 'Select Rate']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_facilities_plan', 'Service Plan') !!}
 	{!! Form::select('id_facilities_plan', $data["facility_plans"], null, ['class' => 'form-control', 'placeholder' => 'Select Facility Plan']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('size', 'Size') !!}
 	{!! Form::select('size', ['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large'], null, ['class' => 'form-control', 'placeholder' => 'Select Size']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('id_bed_type', 'Bed Type') !!}
 	{!! Form::select('id_bed_type', $data["bed_type"], null, ['class' => 'form-control', 'placeholder' => 'Select Bed Type']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('pictures', 'Picture') !!}
 	{!! Form::file('pictures[]', ['multiple' => true, 'class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('cancelation_fee', 'Cancelation Fee') !!}
 	{!! Form::number('cancelation_fee', null, ['class' => 'form-control']) !!}	 	
    
</div>
