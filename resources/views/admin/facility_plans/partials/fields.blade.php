
@if(isset($data['facility_plan']))
	<div class="form-group">
 	{!! Form::label('name', 'Facility Plan Name') !!}
 	{!! Form::text('name', $data['facility_plan']->name, ['class' => 'form-control']) !!}	 	
    
	</div>
	<div id="facilities_container">
		@for($i=0 ; $i < count($data['facility_plan']->facilities); $i++)
			<div class="form-group">
		 	{!! Form::label('facility'.$i, 'Facilites') !!}
		    {!! Form::select('facility'.$i, $data['facilities'], $data['facility_plan']->facilities[$i]->id, ['class' => 'form-control', "placeholder" => "Select Facility",'onchange' => 'addFacility(this);']) !!}	 	
			</div>
		@endfor
		<div class="form-group">
	 	{!! Form::label('facility', 'Facilites') !!}
	    {!! Form::select('facility'. count($data['facility_plan']->facilities), $data['facilities'], null, ['class' => 'form-control','placeholder' => 'Select a Facility', 'onchange' => 'addFacility(this);']) !!}	 	
	    
	</div>
	</div>
@else
<div class="form-group">
 	{!! Form::label('name', 'Facility Plan Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div id="facilities_container">
	<div class="form-group">
	 	{!! Form::label('facility0', 'Facilites') !!}
	    {!! Form::select('facility0', $data['facilities'], null, ['class' => 'form-control','placeholder' => 'Select a Facility', 'onchange' => 'addFacility(this);']) !!}	 	
	    
	</div>
</div>
@endif

