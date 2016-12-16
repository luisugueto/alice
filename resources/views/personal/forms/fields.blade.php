<div class="tab-pane active" id="generales">
	<div class="box-body">
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
				{!! Form::label('codigo', 'Código Personal') !!} <small class="text-red">*</small>
				{!! Form::text('codigo_pesonal', null, ['class' => 'form-control', 'title' => 'Introduzca el codigo del personal', 'placeholder' => 'Ejm: 1189124']) !!}
			</div>
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>
				<div class="form-group">
					{!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Ejm: 178455996', 'title' => 'Introduzca la cédula del personal']) !!}
				</div>
			</div>
			<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
				{!! Form::label('apellidop', 'Apellido paterno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido paterno del personal', 'placeholder' => 'Ejm: Matute']) !!}
			</div>
			<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
				{!! Form::label('apellidom', 'Apellido Materno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'title' => 'Introduzca el apellido materno del personal', 'placeholder' => 'Ejm: Matute']) !!}
			</div>
			<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
				{!! Form::label('nombres', 'Nombres') !!} <small class="text-red">*</small>
				{!! Form::text('nombres', null, ['class' => 'form-control', 'title' => 'Introduzca los nombres del personal', 'placeholder' => 'Ejm: Matute']) !!}
			</div>
			<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
				{!! Form::label('nacimiento', 'Edad') !!} <small class="text-red">*</small>
				{!! Form::text('edad', null, ['class' => 'form-control', 'title' => 'Introduzca la edad del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
				{!! Form::label('nacimiento', 'Fecha nacimiento') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
				{!! Form::label('ingreso', 'Fecha ingreso') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_ingreso', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de ingreso del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
				{!! Form::label('sexo', 'Género') !!} <small class="text-red">*</small>
				{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['class' => 'form-control', 'title' => 'Introduzca el Género del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('edo_civil') ? ' has-error' : '' }}">
				{!! Form::label('ecivil', 'Estado Civil') !!} <small class="text-red">*</small>
				{!! Form::select('edo_civil', array('casado' => 'Casado', 'viudo' => 'Viudo', 'soltero' => 'Soltero'), null, ['class' => 'form-control', 'title' => 'Introduzca el Estado Civil del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>
			<div class="form-group{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
				{!! Form::label('eactual', 'Estado Actual') !!} <small class="text-red">*</small>
				{!! Form::select('estado_actual', array('casado' => 'Casado', 'viudo' => 'Viudo', 'soltero' => 'Soltero'), null, ['class' => 'form-control', 'title' => 'Introduzca el Estado Actual del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>

			<div class="form-group{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
				{!! Form::label('tiporeg', 'Tipo de Registro') !!} <small class="text-red">*</small>
				{!! Form::select('tipo_registro',$tipo, null, ['class' => 'form-control', 'id' =>'tipoRegistro', 'onChange' => 'validarTipo()', 'title' => 'Introduzca el Tipo de Registro  del personal']) !!}
			</div>
			<div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
				{!! Form::label('especialidad', 'Especialidad') !!} <small class="text-red">*</small>
				{!! Form::text('especialidad', null, ['class' => 'form-control', 'title' => 'Introduzca la especialidad del personal', 'placeholder' => 'Ejm: Telecomunicaciones']) !!}
			</div>
			<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
				{!! Form::label('direccion', 'Dirección') !!} <small class="text-red">*</small>
				{!! Form::text('direccion', null, ['class' => 'form-control', 'title' => 'Introduzca la direccion del personal', 'placeholder' => 'Ejm: Sucumbíos']) !!}
			</div>
			<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
				{!! Form::label('telefono', 'Teléfono') !!} <small class="text-red">*</small>
				{!! Form::text('telefono', null, ['class' => 'form-control', 'title' => 'Introduzca la telefono del personal', 'placeholder' => 'Ejm: 5931242145']) !!}
			</div>
			<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
				{!! Form::label('correo', 'Correo') !!} <small class="text-red">*</small>
				{!! Form::text('correo', null, ['class' => 'form-control', 'title' => 'Introduzca el correo del personal', 'placeholder' => 'Ejm: prueba@prueba.com']) !!}
			</div>
			<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
				{!! Form::label('cargo', 'Cargo') !!} <small class="text-red">*</small>
				{!! Form::select('id_cargo',$cargo, null, ['class' => 'form-control', 'title' => 'Introduzca el Cargo del personal']) !!}
			</div>
		<div id="registroUser" >
			<div class="form-group{{ $errors->has('clave') ? ' has-error' : '' }}">
				<input type="checkbox" id="seleccionar" name="seleccionar" onclick="verificar()">
				{!! Form::label('clave', 'Habilitar Usuario') !!}
			</div>
			<div class="form-group{{ $errors->has('clave') ? ' has-error' : '' }}">
				{!! Form::label('clave', 'Clave para los Procesos') !!} <small class="text-red">*</small>
				{!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'clave', 'disabled' => 'true','title' => 'Introduzca la clave del personal', 'placeholder' => 'Ejm: 124asfas']) !!}
			</div>
		</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>
</div>

<div class="tab-pane" id="academica">
	<div class="box-body">
		<div class="col-md-12">
			<div class="form-group{{ $errors->has('primaria') ? ' has-error' : '' }}">
				{!! Form::label('primaria', 'Donde terminó la primaria?: ') !!} <small class="text-red">*</small>
				{!! Form::text('primaria', null, ['class' => 'form-control', 'title' => 'Introduzca Donde terminó la primaria?', 'placeholder' => 'Ejm: Prueba']) !!}
			</div>
			<div class="form-group{{ $errors->has('secundaria') ? ' has-error' : '' }}">
				{!! Form::label('secundaria', 'Donde terminó la secundaria?: ') !!} <small class="text-red">*</small>
				{!! Form::text('secundaria', null, ['class' => 'form-control', 'title' => 'Introduzca Donde terminó la secundaria?:', 'placeholder' => 'Ejm: Prueba']) !!}
			</div>
			<div class="form-group{{ $errors->has('superi') ? ' has-error' : '' }}">
				{!! Form::label('superi', 'Donde terminó Instr. Superior?: ') !!} <small class="text-red">*</small>
				{!! Form::text('superi', null, ['class' => 'form-control', 'title' => 'Introduzca Donde terminó Instr. Superior?:', 'placeholder' => 'Ejm: Universidad Central']) !!}
			</div>
			<div class="form-group{{ $errors->has('titulos') ? ' has-error' : '' }}">
				{!! Form::label('titulos', 'Título(s) Académico(s) Obtenido(s): ') !!} <small class="text-red">*</small>
				{!! Form::text('titulos', null, ['class' => 'form-control', 'title' => 'Introduzca Título(s) Académico(s) Obtenido(s)', 'placeholder' => 'Ejm: Ing Informática']) !!}
			</div>
			<div class="form-group{{ $errors->has('cursos') ? ' has-error' : '' }}">
				{!! Form::label('cursos', 'Cursos y Seminarios: ') !!} <small class="text-red">*</small>
				{!! Form::textarea('cursos', null, ['class' => 'form-control', 'title' => 'Introduzca Cursos y Seminarios', 'placeholder' => 'Ejm: Programacion, Matemáticas ', 'rows' => '3']) !!}
			</div>
			<div class="form-group{{ $errors->has('historia') ? ' has-error' : '' }}">
				{!! Form::label('historia', 'Historia Laboral: ') !!} <small class="text-red">*</small>
				{!! Form::textarea('historia', null, ['class' => 'form-control', 'title' => 'Introduzca la Historia Laboral', 'placeholder' => 'Ejm: ', 'rows' => '3']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>	  			
</div>
	
<div class="tab-pane" id="remuneracion">
	<div class="box-body">
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('prQuincena') ? ' has-error' : '' }}">
				{!! Form::label('prQuincena', 'Sueldo 1era Quincena:: ') !!} <small class="text-red">*</small>
				{!! Form::number('prQuincena', null, ['class' => 'form-control', 'title' => 'Introduzca el Sueldo 1era Quincena?', 'placeholder' => 'Ejm: 150']) !!}
			</div>
			<div class="form-group{{ $errors->has('seQuincena') ? ' has-error' : '' }}">
				{!! Form::label('seQuincena', 'Sueldo 2da Quincena: ') !!} <small class="text-red">*</small>
				{!! Form::number('seQuincena', null, ['class' => 'form-control', 'title' => 'Introduzca el Sueldo 2da Quincena?:', 'placeholder' => 'Ejm: 150']) !!}
			</div>
			<div class="form-group{{ $errors->has('sueldoMensual') ? ' has-error' : '' }}">
				{!! Form::label('sueldoMensual', 'Sueldo Mensual: ') !!} <small class="text-red">*</small>
				{!! Form::number('sueldoMensual', null, ['class' => 'form-control', 'title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300']) !!}
			</div>
			<div class="form-group{{ $errors->has('ieePatronal') ? ' has-error' : '' }}">
				{!! Form::label('ieePatronal', '% IESS Patronal: ') !!} <small class="text-red">*</small>
				{!! Form::number('ieePatronal', null, ['class' => 'form-control', 'title' => 'Introduzca el % IESS Patronal', 'placeholder' => 'Ejm: 10']) !!}
			</div>
			<div class="form-group{{ $errors->has('ieePersonal') ? ' has-error' : '' }}">
				{!! Form::label('ieePersonal', '% IESS Personal: ') !!} <small class="text-red">*</small>
				{!! Form::number('ieePersonal', null, ['class' => 'form-control', 'title' => 'Introduzca el % IESS Personal', 'placeholder' => 'Ejm: 20']) !!}
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('descuento') ? ' has-error' : '' }}">
				{!! Form::label('descuento', 'Descuenta el IESS Sobre: ') !!} <small class="text-red">*</small>
				{!! Form::number('descuento', null, ['class' => 'form-control', 'title' => 'Introduzca Descuenta el IESS Sobre', 'placeholder' => 'Ejm: 30']) !!}
			</div>
			<div class="form-group{{ $errors->has('horasExtras') ? ' has-error' : '' }}">
				{!! Form::label('horasExtras', 'Se paga horas extras al Colaborador: ') !!} <small class="text-red">*</small>
				{!! Form::number('horasExtras', null, ['class' => 'form-control', 'title' => 'Introduzca paga horas extras al Colaborador', 'placeholder' => 'Ejm: 5']) !!}
			</div>
			<div class="form-group{{ $errors->has('devolverFondos') ? ' has-error' : '' }}">
				{!! Form::label('devolverFondos', 'Devolver fondos de reserva en rol de colaborador: ') !!} <small class="text-red">*</small>
				{!! Form::number('devolverFondos', null, ['class' => 'form-control', 'title' => 'Introduzca Devolver fondos de reserva en rol de colaborador', 'placeholder' => 'Ejm: 400']) !!}
			</div>
			<div class="form-group{{ $errors->has('bono') ? ' has-error' : '' }}">
				{!! Form::label('bono', 'BONO RESPONSABILIDAD: ') !!} <small class="text-red">*</small>
				{!! Form::number('bono', null, ['class' => 'form-control', 'title' => 'Introduzca Bono Responsabilidad', 'placeholder' => 'Ejm: Ing Informática']) !!}
			</div>
			<div class="form-group{{ $errors->has('cuenta') ? ' has-error' : '' }}">
				{!! Form::label('cuenta', 'Cuenta Bancaria(Para Nomina): ') !!} <small class="text-red">*</small>
				{!! Form::number('cuenta', null, ['class' => 'form-control', 'title' => 'Introduzca Cuenta Bancaria(Para Nomina)', 'placeholder' => 'Ejm: Ing Informática']) !!}
			</div>
		</div>
		
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
		</div>
	</div>

<script type="text/javascript">
	function verificar(){ 
		for (i=0;i<document.f1.elements.length;i++) 
			if(document.f1.elements[i].type == "checkbox") 
				if(document.f1.seleccionar.checked == 1){
					document.f1.elements[i].checked=1;
					document.getElementById('clave').disabled = false;
					document.getElementById('clave').required = true;
				}
				else if(document.f1.seleccionar.checked == 0){
					document.f1.elements[i].checked=0;
					document.getElementById('clave').disabled = true;
					document.getElementById('clave').required = false;
				}
	}

	function validarTipo(){
		if($('#tipoRegistro').val() == 3){
			$('#registroUser').css('display', 'none');
		}else $('#registroUser').css('display', '');

	}
</script>

</div>
