<div class="control-group"> 
	{!! Form::label('nombre', 'Nombre', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::text('nombre', null, ['class' => 'input-xlarge', 'placeholder' => 'MATRíCULA INICIAL', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'title' => 'Introduzca el nombre del rubro']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('monto', 'Monto', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::number('monto', null, ['class' => 'input-xlarge', 'placeholder' => '300', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'title' => 'Introduzca el monto del rubro']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('fecha', 'Fecha', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::date('fecha', null, ['class' => 'input-xlarge', 'title' => 'Fecha corresponde a la fecha maxima de pago']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('curso', 'Curso', ['class'=>'control-label']) !!} 
	<div class="controls">
		{!! Form::select('id_curso', $cursos, null, ['class' => 'input-xlarge', 'placeholder' => 'Seleccione', 'title' => 'Seleccione el curso que corresponde a este rubro']) !!}
	</div>
</div>

{!! Form::hidden('id_periodo', Session::get('periodo')) !!}