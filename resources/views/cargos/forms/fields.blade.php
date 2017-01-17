<div class="control-group">
    {!! Form::label('Nombre', 'Nombre', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('nombre', null, ['required', 'class'=>'input-xlarge', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('Area', 'Área', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::select('id_area', $area, null, ['class'=>'input-xlarge']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('Tipo de Empleado', 'Tipo de Empleado', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::select('id_tipo_empleado', $tipo, null, ['class'=>'input-xlarge']) !!}
    </div>
</div>