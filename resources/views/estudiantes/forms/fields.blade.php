<div class="tab-pane active" id="tab_1">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>

				<div class="input-group">
					{!! Form::text('cedula', null, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559961', 'title' => 'Introduzca la cédula del estudiante']) !!}

					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" id="buscar" title="Buscar">
							<span class="fa fa-search"></span>
						</button>
					</span>
				</div>
			</div>
			<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
				{!! Form::label('apellido_paterno', 'Apellido paterno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido paterno del estudiante', 'placeholder' => 'Matute', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
				{!! Form::label('nacionalidad', 'Nacionalidad') !!} <small class="text-red">*</small>
				{!! Form::text('nacionalidad', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del estudiante', 'placeholder' => 'Ecuador', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
				{!! Form::label('genero', 'Género') !!} <small class="text-red">*</small>
				{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del estudiante', 'placeholder' => 'Seleccione']) !!}
			</div>
			<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
				{!! Form::label('fecha_nacimiento', 'Fecha nacimiento') !!} <small class="text-red">*</small>
				{!! Form::date('genero', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del estudiante', 'placeholder' => '']) !!}
			</div>
			<div class="form-group{{ $errors->has('dirccion') ? ' has-error' : '' }}">
				{!! Form::label('direccion', 'Dirección') !!} <small class="text-red">*</small>
				{!! Form::textarea('direccion', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('codigo_matricula') ? ' has-error' : '' }}">
				{!! Form::label('codigo_matricula', 'Matrícula') !!} <small class="text-red">*</small>
				{!! Form::text('codigo_matricula', null, ['class' => 'form-control', 'title' => 'Introduzca la matrícula del estudiante', 'placeholder' => '00001961', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
				{!! Form::label('apellido_materno', 'Apellido materno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido materno del estudiante', 'placeholder' => 'Rangel', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }}">
				{!! Form::label('provincia', 'Provincia') !!} <small class="text-red">*</small>
				{!! Form::text('provincia', null, ['class' => 'form-control', 'title' => 'Introduzca la provincia del estudiante', 'placeholder' => 'Sucumbíos', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
				{!! Form::label('estado_actual', 'Estado') !!} <small class="text-red">*</small>
				{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo', 'Desertor' => 'Desertor'), null, ['class' => 'form-control', 'title' => 'Introduzca el estado actual del estudiante', 'placeholder' => 'Seleccione']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('telefono', 'Teléfono') !!}
				{!! Form::text('telefono', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del estudiante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
				{!! Form::label('fecha_registro', 'Fecha de registro') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_registro', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de registro del estudiante con el formato (DIA-MES-AÑO)']) !!}
			</div>
			<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
				{!! Form::label('nombres', 'Nombre(s)') !!} <small class="text-red">*</small>
				{!! Form::text('nombres', null, ['class' => 'form-control', 'title' => 'Introduzca el nombre del estudiante', 'placeholder' => 'Jesús Eduardo', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
				{!! Form::label('ciudad_natal', 'Ciudad') !!} <small class="text-red">*</small>
				{!! Form::text('ciudad', null, ['class' => 'form-control', 'title' => 'Introduzca la ciudad natal del estudiante', 'placeholder' => 'Nueva Loja', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
				{!! Form::label('tipo_registro', 'Tipo registro') !!} <small class="text-red">*</small>
				{!! Form::text('tipo_registro', null, ['class' => 'form-control', 'title' => 'Introduzca el tipo de registro del estudiante', 'placeholder' => 'Ecuador', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('correo', 'Correo electrónico') !!}
				{!! Form::email('correo', null, ['class' => 'form-control', 'title' => 'Introduzca el correo del estudiante incluyendo @ejemplo.com', 'placeholder' => 'correo@ejemplo.com']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_2">
	<div class="box-body">
		@for($i=0; $i < 2; $i++)
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('nombres_pa', 'Nombres') !!}
					{!! Form::text('nombres_pa', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('nacionalidad_pa', 'Nacionalidad') !!}
					{!! Form::text('nacionalidad_pa', null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('cedula_pa', 'Cédula') !!}
					{!! Form::text('cedula_pa', null, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('telefono_pa', 'Teléfono') !!}
					{!! Form::text('telefono_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('nivel_educacion', 'Nivel de educación') !!}
					{!! Form::select('nivel_educacion', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('correo_pa', 'Correo') !!}
					{!! Form::email('correo_pa', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre']) !!}
				</div>
			</div>
			<div class="col-md-12">
				<hr>
			</div>
		@endfor
	</div>
</div>
<div class="tab-pane" id="tab_3">
	<div class="box-body">
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
				{!! Form::number('peso', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '60 KG']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('medicinas_contraindicadas', 'Medicinas contraindicadas') !!}
				{!! Form::textarea('medicinas_contraindicadas', null, ['class' => 'form-control', 'title' => 'Introduzca las medicinas contraindicadas del estudiante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('porcentaje_discapacidad', 'Porcentaje de discapacidad') !!} 
				{!! Form::number('porcentaje_discapacidad', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '40 %']) !!}
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
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_4">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('fecha', 'Fecha') !!}
				{!! Form::date('fecha', null, ['class' => 'form-control', 'title' => 'fecha de la novedad del estudiante']) !!}
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				{!! Form::label('detalles') !!}
				{!! Form::textarea('detalles', null, ['class' => 'form-control', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_5">
	<div class="">
		
	</div>
</div>

<div class="tab-pane" id="tab_6">
	<div class="box-body"	
		<div class="col-md-12">
			<div class="box-footer">
			    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
			    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
			</div>
		</div>
	</div>
</div>