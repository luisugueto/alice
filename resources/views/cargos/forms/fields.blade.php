<div class="form-group">
    {!! Form::label('Nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['required', 'class'=>'form-control', 'placeholder' => 'Secretaria', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
<div class="form-group">
    {!! Form::label('Area', 'Área') !!}
    {!! Form::select('id_area', $area, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Tipo de Empleado', 'Tipo de Empleado') !!}
    {!! Form::select('id_tipo_empleado', $tipo, null, ['class'=>'form-control']) !!}
</div>