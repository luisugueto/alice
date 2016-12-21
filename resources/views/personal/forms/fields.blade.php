<div class="tab-pane active" id="generales">
	<div class="box-body">
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('codigo_pesonal') ? ' has-error' : '' }}">
				{!! Form::label('codigo', 'Código Personal') !!} <small class="text-red">*</small>
				{!! Form::text('codigo_pesonal', null, ['required','class' => 'form-control', 'title' => 'Introduzca el codigo del personal', 'placeholder' => 'Ejm: 1189124']) !!}
			</div>
			<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>
				<div class="form-group">
					{!! Form::number('cedula', null, ['required','class' => 'form-control', 'placeholder' => 'Ejm: 178455996', 'title' => 'Introduzca la cédula del personal']) !!}
				</div>
			</div>
			<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
				{!! Form::label('apellidop', 'Apellido paterno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_paterno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido paterno del personal', 'placeholder' => 'Ejm: UGUETO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
				{!! Form::label('apellidom', 'Apellido Materno') !!} <small class="text-red">*</small>
				{!! Form::text('apellido_materno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido materno del personal', 'placeholder' => 'Ejm: ESCOBAR', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
				{!! Form::label('nombres', 'Nombres') !!} <small class="text-red">*</small>
				{!! Form::text('nombres', null, ['required','class' => 'form-control', 'title' => 'Introduzca los nombres del personal', 'placeholder' => 'Ejm: LUIS', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
				{!! Form::label('nacimiento', 'Edad') !!} <small class="text-red">*</small>
				{!! Form::number('edad', null, ['required','class' => 'form-control', 'title' => 'Introduzca la edad del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
				{!! Form::label('nacimiento', 'Fecha nacimiento') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_nacimiento', null, ['required','class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
				{!! Form::label('ingreso', 'Fecha ingreso') !!} <small class="text-red">*</small>
				{!! Form::date('fecha_ingreso', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de ingreso del personal', 'placeholder' => 'Ejm: ']) !!}
			</div>
			<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
				{!! Form::label('sexo', 'Género') !!} <small class="text-red">*</small>
				{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Género del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('edo_civil') ? ' has-error' : '' }}">
				{!! Form::label('ecivil', 'Estado Civil') !!} <small class="text-red">*</small>
				{!! Form::select('edo_civil', array('casado' => 'Casado', 'viudo' => 'Viudo', 'soltero' => 'Soltero'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Civil del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>
			<div class="form-group{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
				{!! Form::label('eactual', 'Estado Actual') !!} <small class="text-red">*</small>
				{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Actual del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
			</div>

			<div class="form-group{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
				{!! Form::label('tiporeg', 'Tipo de Personal') !!} <small class="text-red">*</small>
				{!! Form::select('tipo_registro',$tipo, null, ['required','class' => 'form-control', 'id' =>'tipoRegistro', 'onChange' => 'validarTipo()', 'title' => 'Introduzca el Tipo de Registro  del personal', 'placeholder'=>'Seleccione']) !!}
			</div>
			<div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
				{!! Form::label('especialidad', 'Especialidad') !!} <small class="text-red">*</small>
				{!! Form::text('especialidad', null, ['required','class' => 'form-control', 'title' => 'Introduzca la especialidad del personal', 'placeholder' => 'Ejm: Telecomunicaciones', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
				{!! Form::label('direccion', 'Dirección') !!} <small class="text-red">*</small>
				{!! Form::text('direccion', null, ['required','class' => 'form-control', 'title' => 'Introduzca la direccion del personal', 'placeholder' => 'Ejm: Sucumbíos', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
				{!! Form::label('telefono', 'Teléfono') !!} <small class="text-red">*</small>
				{!! Form::number('telefono', null, ['required','class' => 'form-control', 'title' => 'Introduzca la telefono del personal', 'placeholder' => 'Ejm: 5931242145']) !!}
			</div>
			<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
				{!! Form::label('correo', 'Correo') !!} <small class="text-red">*</small>
				{!! Form::text('correo', null, ['required','class' => 'form-control', 'title' => 'Introduzca el correo del personal', 'placeholder' => 'Ejm: prueba@prueba.com']) !!}
			</div>
			<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
				{!! Form::label('cargo', 'Cargo') !!} <small class="text-red">*</small>
				<select id="cargo" name="id_cargo" required class="form-control select"></select>
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
				{!! Form::text('primaria', null, ['required','class' => 'form-control', 'title' => 'Introduzca Donde terminó la primaria?', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('secundaria') ? ' has-error' : '' }}">
				{!! Form::label('secundaria', 'Donde terminó la secundaria?: ') !!} <small class="text-red">*</small>
				{!! Form::text('secundaria', null, ['class' => 'form-control', 'title' => 'Introduzca Donde terminó la secundaria?:', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('superior') ? ' has-error' : '' }}">
				{!! Form::label('superi', 'Donde terminó Instr. Superior?: ') !!} <small class="text-red">*</small>
				{!! Form::text('superior', null, ['class' => 'form-control', 'title' => 'Introduzca Donde terminó Instr. Superior?:', 'placeholder' => 'Ejm: Universidad Central', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
				{!! Form::label('titulos', 'Título(s) Académico(s) Obtenido(s): ') !!} <small class="text-red">*</small>
				{!! Form::text('titulo', null, ['class' => 'form-control', 'title' => 'Introduzca Título(s) Académico(s) Obtenido(s)', 'placeholder' => 'Ejm: Ing Informática', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('cursos') ? ' has-error' : '' }}">
				{!! Form::label('cursos', 'Cursos y Seminarios: ') !!} <small class="text-red">*</small>
				{!! Form::textarea('cursos', null, ['class' => 'form-control', 'title' => 'Introduzca Cursos y Seminarios', 'placeholder' => 'Ejm: Programacion, Matemáticas ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('historial_laboral') ? ' has-error' : '' }}">
				{!! Form::label('historia', 'Historia Laboral: ') !!} <small class="text-red">*</small>
				{!! Form::textarea('historial_laboral', null, ['class' => 'form-control', 'title' => 'Introduzca la Historia Laboral', 'placeholder' => 'Ejm: ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
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
			<div class="form-group{{ $errors->has('sueldo_mens') ? ' has-error' : '' }}">
				{!! Form::label('sueldoMensual', 'Sueldo Mensual: ') !!} <small class="text-red">*</small>
				{!! Form::number('sueldo_mens', null, ['required','class' => 'form-control', 'id'=>'sueldoMensual','onkeyup'=>'sueldo()','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300']) !!}
			</div>
			<div class="form-group{{ $errors->has('prQuincena') ? ' has-error' : '' }}">
				{!! Form::label('prQuincena', 'Sueldo 1era Quincena:: ') !!} <small class="text-red">*</small>
				{!! Form::number('prQuincena', null, ['class' => 'form-control','id'=>'prQuincena', 'disabled','title' => 'Introduzca el Sueldo 1era Quincena?', 'placeholder' => 'Ejm: 150']) !!}
			</div>
			<div class="form-group{{ $errors->has('seQuincena') ? ' has-error' : '' }}">
				{!! Form::label('seQuincena', 'Sueldo 2da Quincena: ') !!} <small class="text-red">*</small>
				{!! Form::number('seQuincena', null, ['class' => 'form-control', 'id'=>'seQuincena','disabled','title' => 'Introduzca el Sueldo 2da Quincena?:', 'placeholder' => 'Ejm: 150']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('descuento_iess') ? ' has-error' : '' }}">
				<input type="checkbox" id="verificarr" name="descuenta" onclick="verificarDescuento()">
				{!! Form::label('descuento', 'Descuenta el IESS Sobre: ') !!} <small class="text-red">*</small>
				{!! Form::number('descuento_iess', null, ['class' => 'form-control', 'disabled','id'=>'descuenta','title' => 'Introduzca Descuenta el IESS Sobre', 'placeholder' => 'Ejm: 30']) !!}
			</div>
			<div class="form-group{{ $errors->has('horas_extras') ? ' has-error' : '' }}">
				{!! Form::label('horasExtras', 'Se paga horas extras al Colaborador: ') !!} <small class="text-red">*</small>
				<input type="checkbox" name="horas_extras">
			</div>
			<div class="form-group{{ $errors->has('devolverFondos') ? ' has-error' : '' }}">
				{!! Form::label('devolver_fondos', 'Devolver fondos de reserva en rol de colaborador: ') !!} <small class="text-red">*</small>
				<input type="checkbox" name="devolverFondos">
			</div>
			<div class="form-group{{ $errors->has('bono_responsabilidad') ? ' has-error' : '' }}">
				{!! Form::label('bono', 'BONO RESPONSABILIDAD: ') !!} <small class="text-red">*</small>
				{!! Form::number('bono_responsabilidad', null, ['class' => 'form-control', 'title' => 'Introduzca Bono Responsabilidad', 'placeholder' => 'Ejm: Ing Informática']) !!}
			</div>
			<div class="form-group{{ $errors->has('cuenta_bancaria') ? ' has-error' : '' }}">
				{!! Form::label('cuenta', 'Cuenta Bancaria(Para Nomina): ') !!} <small class="text-red">*</small>
				{!! Form::number('cuenta_bancaria', null, ['class' => 'form-control', 'title' => 'Introduzca Cuenta Bancaria(Para Nomina)', 'placeholder' => 'Ejm: Ing Informática']) !!}
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

		function verificarDescuento(){ 
			if( $('#verificarr').prop('checked') ) {
			    $('#descuenta').attr('disabled', false);
			}else $('#descuenta').attr('disabled', true);
		}

		function validarTipo(){
			if($('#tipoRegistro').val() == 3 || $("#tipoRegistro").val() == 1){
				$('#registroUser').css('display', 'none');
			}else $('#registroUser').css('display', '');


	                var id = $("#tipoRegistro").val();
	                $.get("/cargosPersonal/"+id+"", function(data) 
	                {
	                    $("#cargo").empty();
	                    $("#cargo").append('<option value="" selected disabled> Seleccione </option>');

	                    if(data.length > 0){

	                        for (var i = 0; i < data.length ; i++) 
	                        {  
	                            $("#cargo").removeAttr('disabled');
	                            $("#cargo").append('<option value="'+ data[i].id + '">' + data[i].nombre +'</option>');
	                        }

	                    }else{
	                        
	                        $("#seccion").attr('disabled', true);

	                    }
	                });



		}

		function sueldo(){
			var sueldo = $('#sueldoMensual').val();
			$('#prQuincena').val(parseFloat(sueldo/2));
			$('#seQuincena').val(parseFloat(sueldo/2));
		}
</script>

</div>
