<div class="form-group">
 	{!! Form::label('name', 'Service Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('price', 'Service Price') !!}
 	{!! Form::number('price', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>