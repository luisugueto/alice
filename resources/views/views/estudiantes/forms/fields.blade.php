<div class="tab-pane active" id="tab_1">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>

				<div class="input-group">
					{!! Form::text('cedula', null, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '178455996-1', 'title' => 'Introduzca la cédula del estudiante']) !!}

					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" id="buscar" title="Buscar">
							<span class="fa fa-search"></span>
						</button>
					</span>
				</div>
			</div>
			<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
				{!! Form::label('apellido_paterno', 'Apellido paterno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido paterno del estudiante', 'placeholder' => 'Matute']) !!}
			</div>
			<div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
				{!! Form::label('nacionalidad', 'Nacionalidad') !!} <small class="text-red">*</small>
				{!! Form::text('nacionalidad', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del estudiante', 'placeholder' => 'Ecuador']) !!}
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
				{!! Form::textarea('direccion', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el estudiante', 'placeholder' => '', 'rows' => '3']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('codigo_matricula') ? ' has-error' : '' }}">
				{!! Form::label('codigo_matricula', 'Matrícula') !!} <small class="text-red">*</small>
				{!! Form::text('codigo_matricula', null, ['class' => 'form-control', 'title' => 'Introduzca la matrícula del estudiante', 'placeholder' => '00001961']) !!}
			</div>
			<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
				{!! Form::label('apellido_materno', 'Apellido materno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido materno del estudiante', 'placeholder' => 'Rangel']) !!}
			</div>
			<div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }}">
				{!! Form::label('provincia', 'Provincia') !!} <small class="text-red">*</small>
				{!! Form::text('provincia', null, ['class' => 'form-control', 'title' => 'Introduzca la provincia del estudiante', 'placeholder' => 'Sucumbíos']) !!}
			</div>
			<div class="form-group{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
				{!! Form::label('estado_actual', 'Estado') !!} <small class="text-red">*</small>
				{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo', 'Desertor' => 'Desertor'), null, ['class' => 'form-control', 'title' => 'Introduzca el estado actual del estudiante', 'placeholder' => 'Seleccione']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('telefono', 'Teléfono') !!}
				{!! Form::text('telefono', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del estudiante', 'placeholder' => '']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
				{!! Form::label('fecha_registro', 'Fecha de registro') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_registro', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de registro del estudiante con el formato (DIA-MES-AÑO)']) !!}
			</div>
			<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
				{!! Form::label('nombres', 'Nombre(s)') !!} <small class="text-red">*</small>
				{!! Form::text('nombres', null, ['class' => 'form-control', 'title' => 'Introduzca el nombre del estudiante', 'placeholder' => 'Jesús Eduardo']) !!}
			</div>
			<div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
				{!! Form::label('ciudad_natal', 'Ciudad') !!} <small class="text-red">*</small>
				{!! Form::text('ciudad', null, ['class' => 'form-control', 'title' => 'Introduzca la ciudad natal del estudiante', 'placeholder' => 'Nueva Loja']) !!}
			</div>
			<div class="form-group{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
				{!! Form::label('tipo_registro', 'Tipo registro') !!} <small class="text-red">*</small>
				{!! Form::text('tipo_registro', null, ['class' => 'form-control', 'title' => 'Introduzca el tipo de registro del estudiante', 'placeholder' => 'Ecuador']) !!}
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
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
				{!! Form::label('cedula_re', 'Cédula') !!} <small class="text-red">*</small>

				<div class="input-group">
					{!! Form::text('cedula_re', null, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '178455996-9', 'title' => 'Introduzca la cédula del representante']) !!}

					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" id="buscar" title="Buscar">
							<span class="fa fa-search"></span>
						</button>
					</span>
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('parentesco_re', 'Parentesco') !!}
				{!! Form::text('parentesco_re', null, ['class' => 'form-control', 'title' => 'Introduzca el parentesco del representante', 'placeholder' => '']) !!}
			</div>
			<div class="form-group{{ $errors->has('direccion_re') ? ' has-error' : '' }}">
				{!! Form::label('direccion_re', 'Dirección') !!} <small class="text-red">*</small>
				{!! Form::textarea('direccion_re', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el representante', 'placeholder' => '', 'rows' => '3']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('nombres_re', 'Nombre(s)') !!} <small class="text-red">*</small>
				{!! Form::text('nombres_re', null, ['class' => 'form-control', 'title' => 'Introduzca los nombres del representante', 'placeholder' => 'María']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('telefono_re', 'Teléfono de emergencia') !!} <small class="text-red">*</small>
				{!! Form::text('telefono_re', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del representante', 'placeholder' => '']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('nacionalidad_re', 'Nacionalidad') !!} <small class="text-red">*</small>
				{!! Form::text('nacionalidad_re', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del representante', 'placeholder' => 'Ecuador']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('vive_con', 'Vive con') !!} <small class="text-red">*</small>
				{!! Form::text('vive_con', null, ['class' => 'form-control', 'title' => 'Introduzca con quien vive el representante', 'placeholder' => '']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>	  			
</div>
	
<div class="tab-pane" id="tab_3">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('grupo_sanguineo', 'Grupo sanguineo') !!} 
				{!! Form::text('grupo_sanguineo', null, ['class' => 'form-control', 'title' => 'Introduzca el grupo sanguineo del estudiante', 'placeholder' => 'A+']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('direccion_re', 'Capacidad especial') !!}
				{!! Form::textarea('direccion_re', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('direccion_re', 'Patologia') !!}
				{!! Form::textarea('direccion_re', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('peso', 'Peso') !!} 
				{!! Form::number('peso', null, ['class' => 'form-control', 'title' => 'Introduzca el peso del estudiante', 'placeholder' => '60 KG']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('medicinas_contraindicadas', 'Medicinas contraindicadas') !!}
				{!! Form::textarea('medicinas_contraindicadas', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3']) !!}
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
				{!! Form::textarea('alergico_a', null, ['class' => 'form-control', 'title' => 'Introduzca si posee capacidades especiales el estudiante', 'placeholder' => '', 'rows' => '3']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_4">

</div>

<div class="tab-pane" id="tab_5">

</div>

<div class="tab-pane" id="tab_6">

</div>