<div class="tab-pane active" id="tab1">
	<div class="box-body">
		<div class="span6">
			<div class="control-group">
				{!! Form::label('codigo', 'Código Personal: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('codigo_pesonal') ? ' has-error' : '' }}">
					{!! Form::text('codigo_pesonal', null, ['required','maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'title' => 'Introduzca el codigo del personal', 'placeholder' => 'Ejm: 1189124']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cedula', 'Cédula: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('cedula') ? ' has-error' : '' }}">
					{!! Form::number('cedula', null, ['required','maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'placeholder' => 'Ejm: 178455996', 'title' => 'Introduzca la cédula del personal']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellidop', 'Apellido paterno: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
					{!! Form::text('apellido_paterno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido paterno del personal', 'placeholder' => 'Ejm: UGUETO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellidom', 'Apellido Materno: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
					{!! Form::text('apellido_materno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido materno del personal', 'placeholder' => 'Ejm: ESCOBAR', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nombres', 'Nombres: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('nombres') ? ' has-error' : '' }}">
					{!! Form::text('nombres', null, ['required','class' => 'form-control', 'title' => 'Introduzca los nombres del personal', 'placeholder' => 'Ejm: LUIS', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nacimiento', 'Edad: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('edad') ? ' has-error' : '' }}">
					{!! Form::number('edad', null, ['required','min'=>'18','max'=>'99','maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'title' => 'Introduzca la edad del personal', 'placeholder' => 'Ejm: ']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nacimiento', 'Fecha nacimiento: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
					{!! Form::date('fecha_nacimiento', null, ['required','class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del personal', 'placeholder' => 'Ejm: ']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('ingreso', 'Fecha ingreso: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
					{!! Form::date('fecha_ingreso', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de ingreso del personal', 'placeholder' => 'Ejm: ']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('sexo', 'Género: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('genero') ? ' has-error' : '' }}">
					{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Género del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group">
				{!! Form::label('ecivil', 'Estado Civil: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('edo_civil') ? ' has-error' : '' }}">
					{!! Form::select('edo_civil', array('casado' => 'Casado', 'viudo' => 'Viudo', 'soltero' => 'Soltero'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Civil del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('eactual', 'Estado Actual: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('estado_actual') ? ' has-error' : '' }}">
					{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Actual del personal', 'placeholder' => 'Ejm: Seleccione']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('tiporeg', 'Tipo de Personal: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('tipo_registro') ? ' has-error' : '' }}">
					{!! Form::select('tipo_registro',$tipo, null, ['required','class' => 'form-control', 'id' =>'tipoRegistro', 'onChange' => 'validarTipo()', 'title' => 'Introduzca el Tipo de Registro  del personal', 'placeholder'=>'Seleccione']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('especialidad', 'Especialidad: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('especialidad') ? ' has-error' : '' }}">
					{!! Form::text('especialidad', null, ['required','class' => 'form-control', 'title' => 'Introduzca la especialidad del personal', 'placeholder' => 'Ejm: Telecomunicaciones', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('direccion', 'Dirección: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('direccion') ? ' has-error' : '' }}">
					{!! Form::text('direccion', null, ['required','class' => 'form-control', 'title' => 'Introduzca la direccion del personal', 'placeholder' => 'Ejm: Sucumbíos', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('telefono', 'Teléfono: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('telefono') ? ' has-error' : '' }}">
					{!! Form::number('telefono', null, ['required','class' => 'form-control', 'maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'title' => 'Introduzca la telefono del personal', 'placeholder' => 'Ejm: 5931242145']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('correo', 'Correo: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('correo') ? ' has-error' : '' }}">
					{!! Form::text('correo', null, ['required','class' => 'form-control', 'title' => 'Introduzca el correo del personal', 'placeholder' => 'Ejm: prueba@prueba.com']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cargo', 'Cargo: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('cargo') ? ' has-error' : '' }}">
					<select id="cargo" name="id_cargo" required class="form-control select"></select>
				</div>
			</div>
			<div id="registroUser" >
				<div class="control-group">
					{!! Form::label('clave', 'Clave para los Procesos: ', ['class'=>'control-label']) !!}

					<div class="controls{{ $errors->has('nacionalidad_pa') ? ' has-error' : '' }}">
						{!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'clave', 'disabled' => 'true','title' => 'Introduzca la clave del personal', 'placeholder' => 'Ejm: 124asfas']) !!}
						<span class="help-inline"><input title="Seleccione para habilitar Clave para los Procesos" type="checkbox" id="seleccionar" name="seleccionar" onclick="verificar()"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="tab-pane" id="tab2">
	<div class="box-body">
		<div class="span12">
			<div class="control-group">
				{!! Form::label('primaria', '¿Dónde terminó la primaria?: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('primaria') ? ' has-error' : '' }}">
					{!! Form::text('primaria', null, ['required','class' => 'form-control', 'title' => 'Introduzca Dónde terminó la primaria?', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('secundaria', '¿Dónde terminó la secundaria?: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('secundaria') ? ' has-error' : '' }}">
					{!! Form::text('secundaria', null, ['class' => 'form-control', 'title' => 'Introduzca Dónde terminó la secundaria?:', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('superi', '¿Dónde terminó Instrucción Superior?: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('superior') ? ' has-error' : '' }}">
					{!! Form::text('superior', null, ['class' => 'form-control', 'title' => 'Introduzca Dónde terminó Instr. Superior?:', 'placeholder' => 'Ejm: Universidad Central', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('titulos', 'Título(s) Académico(s) Obtenido(s): ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('titulo') ? ' has-error' : '' }}">
					{!! Form::text('titulo', null, ['class' => 'form-control', 'title' => 'Introduzca Título(s) Académico(s) Obtenido(s)', 'placeholder' => 'Ejm: Ing Informática', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cursos', 'Cursos y Seminarios: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('cursos') ? ' has-error' : '' }}">
					{!! Form::textarea('cursos', null, ['class' => 'form-control', 'title' => 'Introduzca Cursos y Seminarios', 'placeholder' => 'Ejm: Programacion, Matemáticas ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('historia', 'Historia Laboral: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('historial_laboral') ? ' has-error' : '' }}">
					{!! Form::textarea('historial_laboral', null, ['class' => 'form-control', 'title' => 'Introduzca la Historia Laboral', 'placeholder' => 'Ejm: ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
				</div>
			</div>
		</div>
	</div>	  			
</div>
	
<div class="tab-pane" id="tab3">
	<div class="box-body">
		<div class="span6">
			<div class="control-group">
				{!! Form::label('sueldoMensual', 'Sueldo Mensual: (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('sueldo_mens') ? ' has-error' : '' }}">
					{!! Form::number('sueldo_mens', null, ['required','class' => 'form-control', 'id'=>'sueldoMensual','onkeyup'=>'sueldo()','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('prQuincena', 'Sueldo 1era Quincena: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('prQuincena') ? ' has-error' : '' }}">
					{!! Form::number('prQuincena', null, ['class' => 'form-control','id'=>'prQuincena', 'disabled','title' => 'Introduzca el Sueldo 1era Quincena?', 'placeholder' => 'Ejm: 150']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('seQuincena', 'Sueldo 2da Quincena: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('seQuincena') ? ' has-error' : '' }}">
					{!! Form::number('seQuincena', null, ['class' => 'form-control', 'id'=>'seQuincena','disabled','title' => 'Introduzca el Sueldo 2da Quincena?:', 'placeholder' => 'Ejm: 150']) !!}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group">

				{!! Form::label('descuento', 'Descuenta el IESS Sobre: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('descuento_iess') ? ' has-error' : '' }}">
					{!! Form::number('descuento_iess', null, ['max'=>'100','class' => 'form-control', 'disabled','id'=>'descuenta','title' => 'Introduzca Descuenta el IESS Sobre', 'placeholder' => 'Ejm: 30']) !!}
					<span class="help-inline"><input type="checkbox" id="verificarr" title="Seleccione para habilitar Descuenta el IESS" name="descuenta" onclick="verificarDescuento()"></span>
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('horasExtras', 'Se paga horas extras al Colaborador: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('horas_extras') ? ' has-error' : '' }}">
					<input type="checkbox" name="horas_extras">
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('devolver_fondos', 'Devolver fondos de reserva en rol de colaborador: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('devolverFondos') ? ' has-error' : '' }}">
					<input type="checkbox" name="devolverFondos">
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('bono', 'BONO RESPONSABILIDAD: ', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('bono_responsabilidad') ? ' has-error' : '' }}">
					{!! Form::number('bono_responsabilidad', null, ['class' => 'form-control', 'title' => 'Introduzca Bono Responsabilidad', 'placeholder' => 'Ejm: Ing Informática']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cuenta', 'Cuenta Bancaria(Para Nómina): (*)', ['class'=>'control-label']) !!}
				<div class="controls{{ $errors->has('cuenta_bancaria') ? ' has-error' : '' }}">
					{!! Form::number('cuenta_bancaria', null, ['class' => 'form-control', 'title' => 'Introduzca Cuenta Bancaria(Para Nomina)', 'placeholder' => 'Ejm: Ing Informática']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
		$(document).ready(function(){
			$("#verificarr").prop("checked", false);
		});

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

