
<div class="form-group">
 	{!! Form::label('name', 'Service Plan Name') !!}
 	{!! Form::text('name', null, ['class' => 'form-control']) !!}	 	
    
</div>
<div id="services_container">
	<div class="form-group">
	 	{!! Form::label('service0', 'Services') !!}
	    {!! Form::select('service0', ['' => 'Select a Service'] + $services, null, ['class' => 'form-control', 'onchange' => 'addService(this);']) !!}	 	
	    
	</div>
</div>


