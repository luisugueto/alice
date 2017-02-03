

@foreach($tipo_empleado as $tipo)
<div class="control-group">
    {!! Form::label('Nombre',$tipo->tipo_empleado , ['class'=>'control-label']) !!}
    {!! Form::hidden('id_tipoempleado[]',$tipo->id) !!}
    <div class="controls">
    	{!! Form::number('cantidad[]',0.01,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.01','title' => 'Ingrese la cantidad para descontar por minuto a este tipo de empleado', 'min' => '0.01', 'max' => '10.00', 'required' => 'required', 'id' => 'individuales', 'maxlength' => '4','step' => 'any','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>$</strong>
    </div>
</div>
@endforeach
