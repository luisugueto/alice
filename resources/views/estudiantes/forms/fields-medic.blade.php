<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('grupo_sanguineo', 'Grupo sanguineo') !!} 
		{!! Form::select('grupo_sanguineo',array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'), null, ['class' => 'form-control', 'title' => 'Introduzca el grupo sanguineo del estudiante', 'placeholder' => 'Seleccione']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('capacidad_especial', 'Capacidad especial') !!}
		{!! Form::textarea('capacidad_especial', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('patologia', 'Patologia') !!}
		{!! Form::textarea('patologia', null, ['class' => 'form-control', 'title' => 'Introduzca si posee algúna patologia el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('peso', 'Peso') !!} 
		{!! Form::number('peso', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '60']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('medicinas_contraindicadas', 'Medicinas contraindicadas') !!}
		{!! Form::textarea('medicinas_contraindicadas', null, ['class' => 'form-control', 'title' => 'Introduzca las medicinas contraindicadas del estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('porcentaje_discapacidad', 'Porcentaje de discapacidad') !!} 
		{!! Form::number('porcentaje_discapacidad', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '40']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('altura', 'Altura') !!} 
		{!! Form::number('altura', null, ['class' => 'form-control', 'title' => 'Introduzca la altura del estudiante', 'placeholder' => '1.60']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('alergico_a', 'Alergico a') !!}
		{!! Form::textarea('alergico_a', null, ['class' => 'form-control', 'title' => 'Introduzca si es alergico el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>