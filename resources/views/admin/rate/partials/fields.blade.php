<div class="form-group">
 	{!! Form::label('name', 'Rate Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('weekday_price', 'Daily Price') !!}
 	{!! Form::number('weekday_price', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>
<div class="form-group">
 	{!! Form::label('weekend_price', 'Week End Price') !!}
 	{!! Form::number('weekend_price', null, ['class' => 'form-control', 'min' => 0]) !!}	 	
    
</div>