<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('grupo_sanguineo', 'Grupo sanguineo') !!} <small class="text-red">*</small>
		{!! Form::select('grupo_sanguineo',array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'), null, ['class' => 'form-control', 'title' => 'Introduzca el grupo sanguineo del estudiante', 'placeholder' => 'Seleccione']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('capacidad_especial', 'Capacidad especial') !!} &nbsp;&nbsp; Si &nbsp;&nbsp;<input type="radio" name="capacidad" value="Si"  id="capacidad" onclick="capacidad_es()"> No &nbsp;&nbsp;<input type="radio" name="capacidad" value="No" onclick="capacidad_es()" id="capacidad" checked="checked">
		{!! Form::textarea('capacidad_especial', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'disabled' => 'disabled', 'id' => 'capacidad_especial']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('patologia', 'Patologia') !!} &nbsp;&nbsp; Si &nbsp;&nbsp;<input type="radio" name="patologia_e" id="patologia_estudiante" onclick="patologia_es()" value="Si"> No &nbsp;&nbsp;<input type="radio" name="patologia_e" id="patologia_estudiante" onclick="patologia_es()" value="No" checked="checked" >
		{!! Form::textarea('patologia', null, ['class' => 'form-control', 'title' => 'Introduzca si posee algúna patologia el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'disabled' => 'disabled', 'id' => 'patologia']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('peso', 'Peso') !!} 
		{!! Form::number('peso', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '60']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('medicinas_contraindicadas', 'Medicinas contraindicadas') !!} &nbsp;&nbsp; Si &nbsp;&nbsp;<input type="radio" name="medicinas_e" id="medicinas_e" onclick="medicinas()" value="Si"> No &nbsp;&nbsp;<input type="radio" name="medicinas_e" id="medicinas_e" onclick="medicinas()" value="No" checked="checked">
		{!! Form::textarea('medicinas_contraindicadas', null, ['class' => 'form-control', 'title' => 'Introduzca las medicinas contraindicadas del estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()' , 'disabled' => 'disabled', 'id' => 'medicinas_contraindicadas']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('porcentaje_discapacidad', 'Porcentaje de discapacidad') !!} &nbsp;&nbsp; Si &nbsp;&nbsp;<input type="radio" name="discapacidad_e" id="discapacidad_e" onclick="discapacidad()" value="Si"> No &nbsp;&nbsp;<input type="radio" name="discapacidad_e" id="discapacidad_e" value="No" onclick="discapacidad()" checked="checked">
		{!! Form::number('porcentaje_discapacidad', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '40', 'disabled' => 'disabled', 'id' => 'porcentaje_discapacidad']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('altura', 'Altura') !!} 
		{!! Form::number('altura', null, ['class' => 'form-control', 'title' => 'Introduzca la altura del estudiante', 'placeholder' => '1.60']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('alergico_a', 'Alergico') !!} &nbsp;&nbsp; Si &nbsp;&nbsp;<input type="radio" name="alergico" id="alergico" onclick="alergia()" value="Si"> No &nbsp;&nbsp;<input type="radio" name="alergico" id="alergico" value="No" onclick="alergia()" checked="checked">
		{!! Form::textarea('alergico_a', null, ['class' => 'form-control', 'title' => 'Introduzca si es alergico el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'disabled' => 'disabled', 'id' => 'alergico_a']) !!}
	</div>
</div>