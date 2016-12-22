<div class="form-group"> 
	{!! Form::label('nombre', 'Nombre') !!} <small class="text-red">*</small>
	{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'MATRíCULA INICIAL', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'title' => 'Introduzca el nombre del rubro']) !!}
</div>
<div class="form-group">
	{!! Form::label('monto', 'Monto') !!} <small class="text-red">*</small>
	{!! Form::number('monto', null, ['class' => 'form-control', 'placeholder' => '300', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'title' => 'Introduzca el monto del rubro']) !!}
</div>
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!} <small class="text-red">*</small>
	{!! Form::date('fecha', null, ['class' => 'form-control', 'title' => 'Fecha corresponde a la fecha maxima de pago']) !!}
</div>
<div class="form-group">
	{!! Form::label('curso', 'Curso') !!} <small class="text-red">*</small> 
	{!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'title' => 'Seleccione el curso que corresponde a este rubro']) !!}
</div>

{!! Form::hidden('id_periodo', Session::get('periodo')) !!}