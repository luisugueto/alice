<div class="tab-pane active" id="tab_1">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>
				{!! Form::text('cedula', $cedula, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559961', 'title' => 'Introduzca la cédula del estudiante', 'disabled' => 'disabled']) !!} {!! Form::hidden('cedula', $cedula) !!}
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
			<div class="form-group{{ $errors->has('ciudad_natal') ? ' has-error' : '' }}">
				{!! Form::label('ciudad_natal', 'Ciudad') !!} <small class="text-red">*</small>
				{!! Form::text('ciudad_natal', null, ['class' => 'form-control', 'title' => 'Introduzca la ciudad natal del estudiante', 'placeholder' => 'Nueva Loja', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
				{!! Form::label('tipo_registro', 'Tipo registro') !!} <small class="text-red">*</small>
				{!! Form::text('tipo_registro', null, ['class' => 'form-control', 'title' => 'Introduzca el tipo de registro del estudiante', 'placeholder' => 'Normal', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
				{!! Form::label('correo', 'Correo electrónico') !!} <small class="text-red">*</small>
				{!! Form::email('correo', null, ['class' => 'form-control', 'title' => 'Introduzca el correo del estudiante incluyendo @ejemplo.com', 'placeholder' => 'correo@ejemplo.com']) !!}
			</div>
		</div>
	</div>
</div>

<div class="tab-pane" id="tab_2">
	<div class="box-body">
		@include('estudiantes.forms.fields-family')
	</div>
</div>
<div class="tab-pane" id="tab_3">
	<div class="box-body">
		@include('estudiantes.forms.fields-medic')
	</div>
</div>

<div class="tab-pane" id="tab_4">
	<div class="box-body">
		@include('estudiantes.forms.fields-news')
	</div>
</div>

<div class="tab-pane" id="tab_5">
	<div class="box-body">
		@include('estudiantes.forms.fields-documentations')
	</div>
</div>

<div class="tab-pane" id="tab_6">
	 <div id="contenedor">
	</div>
	<div class="box-body">

		@include('estudiantes.forms.fields-items')
		<!-- <div class="col-md-4">
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
		</div> -->
		{!! Form::hidden('id_representante', $representante->id) !!}
	</div>
</div>
