<div class="tab-pane active" id="tab1">
	<div class="box-body">
		<div class="span6">
			<div class="control-group">
				{!! Form::label('codigo', 'Código Personal: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('codigo_pesonal', null, ['required','maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'title' => 'Introduzca el codigo del personal', 'placeholder' => 'Ejm: 1189124', 'style'=>$errors->has('codigo_pesonal') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cedula', 'Cédula: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('cedula', null, ['required','maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'placeholder' => 'Ejm: 178455996', 'title' => 'Introduzca la cédula del personal', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellidop', 'Apellido paterno: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('apellido_paterno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido paterno del personal', 'placeholder' => 'Ejm: UGUETO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellido_paterno') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('apellidom', 'Apellido Materno: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('apellido_materno', null, ['required','class' => 'form-control', 'title' => 'Introduzca el apellido materno del personal', 'placeholder' => 'Ejm: ESCOBAR', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellido_materno') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nombres', 'Nombres: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('nombres', null, ['required','class' => 'form-control', 'title' => 'Introduzca los nombres del personal', 'placeholder' => 'Ejm: LUIS', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nacimiento', 'Edad: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('edad', null, ['required','min'=>'18','max'=>'99','maxlength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','class' => 'form-control', 'title' => 'Introduzca la edad del personal', 'placeholder' => 'Ejm: ', 'style'=>$errors->has('edad') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('nacimiento', 'Fecha nacimiento: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::date('fecha_nacimiento', null, ['required','class' => 'form-control', 'title' => 'Introduzca la fecha de nacimiento del personal', 'placeholder' => 'Ejm: ', 'style'=>$errors->has('fecha_nacimiento') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('ingreso', 'Fecha ingreso: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::date('fecha_ingreso', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de ingreso del personal', 'placeholder' => 'Ejm: ', 'style'=>$errors->has('fecha_ingreso') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('sexo', 'Género: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::select('genero', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Género del personal', 'placeholder' => 'Ejm: Seleccione', 'style'=>$errors->has('genero') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group">
				{!! Form::label('ecivil', 'Estado Civil: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::select('edo_civil', array('casado' => 'Casado', 'viudo' => 'Viudo', 'soltero' => 'Soltero'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Civil del personal', 'placeholder' => 'Ejm: Seleccione', 'style'=>$errors->has('edo_civil') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('eactual', 'Estado Actual: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::select('estado_actual', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), null, ['required','class' => 'form-control', 'title' => 'Introduzca el Estado Actual del personal', 'placeholder' => 'Ejm: Seleccione', 'style'=>$errors->has('estado_actual') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('tiporeg', 'Tipo de Personal: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::select('tipo_registro',$tipo, null, ['required','class' => 'form-control', 'id' =>'tipoRegistro', 'onChange' => 'validarTipo()', 'title' => 'Introduzca el Tipo de Registro  del personal', 'placeholder'=>'Seleccione', 'style'=>$errors->has('tipo_registro') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('especialidad', 'Especialidad: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('especialidad', null, ['required','class' => 'form-control', 'title' => 'Introduzca la especialidad del personal', 'placeholder' => 'Ejm: Telecomunicaciones', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('especialidad') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('direccion', 'Dirección: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('direccion', null, ['required','class' => 'form-control', 'title' => 'Introduzca la direccion del personal', 'placeholder' => 'Ejm: Sucumbíos', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('telefono', 'Teléfono: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('telefono', null, ['required','class' => 'form-control', 'maxlength' => '11','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'title' => 'Introduzca la telefono del personal', 'placeholder' => 'Ejm: 5931242145', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('correo', 'Correo: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('correo', null, ['required','class' => 'form-control', 'title' => 'Introduzca el correo del personal', 'placeholder' => 'Ejm: prueba@prueba.com', 'style'=>$errors->has('correo') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cargo', 'Cargo: (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::select('id_cargo',[],null, ['required','class' => 'form-control', 'id' =>'cargo', 'title' => 'Introduzca el  del personal', 'placeholder'=>'Seleccione', 'style'=>$errors->has('clave') ? 'border-color: red; border: 1px solid red;': '']) !!}
					<!-- <select id="cargo" name="id_cargo" required class="form-control select" style=$errors->has('id_cargo') ? 'border-color: red; border: 1px solid red;': ''></select> -->

				</div>
			</div>
			<div id="registroUser" >
				<div class="control-group">
					{!! Form::label('clave', 'Clave para los Procesos: ', ['class'=>'control-label']) !!}

					<div class="controls">
						{!! Form::text('clave', null, ['class' => 'form-control', 'id' => 'clave', 'disabled' => 'true','title' => 'Introduzca la clave del personal', 'placeholder' => 'Ejm: 124asfas', 'style'=>$errors->has('clave') ? 'border-color: red; border: 1px solid red;': '']) !!}
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
				<div class="controls">
					{!! Form::text('primaria', null, ['required','class' => 'form-control', 'title' => 'Introduzca Dónde terminó la primaria?', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('primaria') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('secundaria', '¿Dónde terminó la secundaria?: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('secundaria', null, ['class' => 'form-control', 'title' => 'Introduzca Dónde terminó la secundaria?:', 'placeholder' => 'Ejm: Prueba', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('secundaria') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('superi', '¿Dónde terminó Instrucción Superior?: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('superior', null, ['class' => 'form-control', 'title' => 'Introduzca Dónde terminó Instr. Superior?:', 'placeholder' => 'Ejm: Universidad Central', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('superior') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('titulos', 'Título(s) Académico(s) Obtenido(s): ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::text('titulo', null, ['class' => 'form-control', 'title' => 'Introduzca Título(s) Académico(s) Obtenido(s)', 'placeholder' => 'Ejm: Ing Informática', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('titulo') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cursos', 'Cursos y Seminarios: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::textarea('cursos', null, ['class' => 'form-control', 'title' => 'Introduzca Cursos y Seminarios', 'placeholder' => 'Ejm: Programacion, Matemáticas ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('cursos') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('historia', 'Historia Laboral: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::textarea('historial_laboral', null, ['class' => 'form-control', 'title' => 'Introduzca la Historia Laboral', 'placeholder' => 'Ejm: ', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('historial_laboral') ? 'border-color: red; border: 1px solid red;': '']) !!}
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
				<div class="controls">
					{!! Form::number('sueldo_mens', null, ['required','class' => 'form-control', 'id'=>'sueldoMensual','onkeyup'=>'sueldo()','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300', 'style'=>$errors->has('sueldo_mens') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('prQuincena', 'Sueldo 1era Quincena: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('prQuincena', null, ['class' => 'form-control','id'=>'prQuincena', 'disabled','title' => 'Introduzca el Sueldo 1era Quincena?', 'placeholder' => 'Ejm: 150']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('seQuincena', 'Sueldo 2da Quincena: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('seQuincena', null, ['class' => 'form-control', 'id'=>'seQuincena','disabled','title' => 'Introduzca el Sueldo 2da Quincena?:', 'placeholder' => 'Ejm: 150']) !!}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group">

				{!! Form::label('descuento', 'Descuenta el IESS Sobre: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('descuento_iess', null, ['max'=>'100','class' => 'form-control', 'disabled','id'=>'descuenta','title' => 'Introduzca Descuenta el IESS Sobre', 'placeholder' => 'Ejm: 30', 'style'=>$errors->has('descuento_iess') ? 'border-color: red; border: 1px solid red;': '']) !!}
					<span class="help-inline"><input type="checkbox" id="verificarr" title="Seleccione para habilitar Descuenta el IESS" name="descuenta" onclick="verificarDescuento()"></span>
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('horasExtras', 'Se paga horas extras al Colaborador: ', ['class'=>'control-label']) !!}
				<div class="controls">
					<input type="checkbox" name="horas_extras">
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('devolver_fondos', 'Devolver fondos de reserva en rol de colaborador: ', ['class'=>'control-label']) !!}
				<div class="controls">
					<input type="checkbox" name="devolverFondos">
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('bono', 'BONO RESPONSABILIDAD: ', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('bono_responsabilidad', null, ['class' => 'form-control', 'title' => 'Introduzca Bono Responsabilidad', 'placeholder' => 'Ejm: Ing Informática', 'style'=>$errors->has('bono_responsabilidad') ? 'border-color: red; border: 1px solid red;': '']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cuenta', 'Cuenta Bancaria(Para Nómina): (*)', ['class'=>'control-label']) !!}
				<div class="controls">
					{!! Form::number('cuenta_bancaria', null, ['class' => 'form-control', 'title' => 'Introduzca Cuenta Bancaria(Para Nomina)', 'placeholder' => 'Ejm: Ing Informática', 'style'=>$errors->has('cuenta_bancaria') ? 'border-color: red; border: 1px solid red;': '']) !!}
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

