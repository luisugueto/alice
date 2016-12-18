<div class="tab-pane active" id="tab_1">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>
				{!! Form::text('cedula', $cedula, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559961', 'title' => 'Introduzca la cédula del estudiante', 'disabled' => 'disabled']) !!}
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
				{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del estudiante', 'placeholder' => '']) !!}
			</div>
			<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
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
			<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
				{!! Form::label('telefono', 'Teléfono') !!} <small class="text-red">*</small>
				{!! Form::text('telefono', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del estudiante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('fecha_registro') ? ' has-error' : '' }}">
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
			<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
				{!! Form::label('correo', 'Correo electrónico') !!} <small class="text-red">*</small>
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
		<div class="col-md-12">
			<input type="checkbox" id="bloquear" onclick="bloqueo()" class="" title="Seleccione si desea registrar un solo padre o madre"/> <b>Ocultar</b>
		</div>
		@for($i=0; $i < 2; $i++)
		<div id="contenido"><br><br>
			<div class="col-md-4">
				<div class="form-group{{ $errors->has('nombres_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('nombres_pa', 'Nombres') !!} <small class="text-red">*</small>
					{!! Form::text('nombres_pa'.$i, null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata1']) !!}
				</div>
				<div class="form-group{{ $errors->has('nacionalidad_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('nacionalidad_pa', 'Nacionalidad') !!} <small class="text-red">*</small>
					{!! Form::text('nacionalidad_pa'.$i, null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata2']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group{{ $errors->has('cedula_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('cedula_pa', 'Cédula') !!} <small class="text-red">*</small>
					{!! Form::text('cedula_pa'.$i, null, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata3']) !!}
				</div>
				<div class="form-group{{ $errors->has('telefono_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('telefono_pa', 'Teléfono') !!} <small class="text-red">*</small>
					{!! Form::text('telefono_pa'.$i, null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata4']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('nivel_educacion', 'Nivel de educación') !!}
					{!! Form::select('nivel_educacion'.$i, array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'zapata5']) !!}
				</div>
				<div class="form-group{{ $errors->has('correo_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('correo_pa', 'Correo') !!} <small class="text-red">*</small>
					{!! Form::email('correo_pa'.$i, null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'zapata6']) !!}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('lugar_trabajo'.$i) ? ' has-error' : '' }}">
					{!! Form::label('lugar_trabajo', 'Lugar trabajo') !!} <small class="text-red">*</small>
					{!! Form::textarea('lugar_trabajo'.$i, null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata7']) !!}
				</div>
				<div class="form-group{{ $errors->has('direccion_pa'.$i) ? ' has-error' : '' }}">
					{!! Form::label('direccion_pa', 'Dirección') !!} <small class="text-red">*</small>
					{!! Form::textarea('direccion_pa'.$i, null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata8']) !!}
				</div>
			</div>
		</div>
		@endfor
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
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_5">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('codigo', 'Codigo') !!}
				{!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'DOC-0001', 'Introduzca el codigo del documento']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('digitalizado', 'Digitalizado') !!}
				{!! Form::file('digitalizado', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('titulo', 'Título') !!}
				{!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Acta de nacimiento', 'title' => 'Introduzca el título del documento']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('entregado', 'Entregado') !!}
				{!! Form::date('entregado', null, ['class' => 'form-control', 'title' => 'Fecha de entrega del documento']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_6">
	 <div id="contenedor">
	</div>
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('nombre', 'Nombre') !!}
				{!! Form::text('nombre[0]', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'MATRICULA INICIAL', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('fecha_max', 'Fecha') !!}
				{!! Form::date('fecha_max[0]', null, ['class' => 'form-control', 'id' => 'fecha_max', 'placeholder' => '35']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('monto', 'Monto') !!}
				{!! Form::number('monto[0]', null, ['class' => 'form-control', 'id' => 'monto', 'placeholder' => '35']) !!}
			</div>
		</div>
		<div class="col-md-1">
			<center>
				{!! Form::label('agregar', 'Nuevo') !!}
				<a href="#" id="agregarCampo" class="text-muted"><i class="fa fa-plus-square btn-lg"></i></a>	
			</center>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
		<div class="col-md-12"><br><br>
			<div class="box-footer">
			    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
			    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
			</div>
		</div>
	</div>
</div>
