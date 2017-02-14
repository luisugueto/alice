

<div class="control-group">
   {!! Form::label('cantidad','Cantidad a descontar' , ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::number('cantidad',$descuentos->cantidad,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.01','title' => 'Ingrese la cantidad a descontar', 'min' => '0.01', 'max' => '10.00', 'required' => 'required', 'id' => 'individuales', 'maxlength' => '4','step' => 'any','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>$</strong>
    </div>
</div>

