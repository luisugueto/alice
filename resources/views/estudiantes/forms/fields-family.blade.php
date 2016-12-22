<div id="contenido">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('cedula_pa') ? ' has-error' : '' }}">
			{!! Form::label('cedula_pa', 'Cédula') !!} <small class="text-red">*</small>
			{!! Form::text('cedula_pa', null, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata2']) !!}
		</div>
		<div class="form-group{{ $errors->has('nacionalidad_pa') ? ' has-error' : '' }}">
			{!! Form::label('nacionalidad_pa', 'Nacionalidad') !!} <small class="text-red">*</small>
			{!! Form::text('nacionalidad_pa', null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata1']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombres_pa') ? ' has-error' : '' }}">
			{!! Form::label('nombres_pa', 'Nombres') !!} <small class="text-red">*</small>
			{!! Form::text('nombres_pa', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata0']) !!}
		</div>
		<div class="form-group{{ $errors->has('telefono_pa') ? ' has-error' : '' }}">
			{!! Form::label('telefono_pa', 'Teléfono') !!} <small class="text-red">*</small>
			{!! Form::text('telefono_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata3']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('nivel_educacion', 'Nivel de educación') !!}
			{!! Form::select('nivel_educacion', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'zapata4']) !!}
		</div>
		<div class="form-group{{ $errors->has('correo_pa') ? ' has-error' : '' }}">
			{!! Form::label('correo_pa', 'Correo') !!} <small class="text-red">*</small>
			{!! Form::email('correo_pa', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'zapata5']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group{{ $errors->has('lugar_trabajo') ? ' has-error' : '' }}">
			{!! Form::label('lugar_trabajo', 'Lugar trabajo') !!} <small class="text-red">*</small>
			{!! Form::textarea('lugar_trabajo', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata7']) !!}
		</div>
		<div class="form-group{{ $errors->has('direccion_pa') ? ' has-error' : '' }}">
			{!! Form::label('direccion_pa', 'Dirección') !!} <small class="text-red">*</small>
			{!! Form::textarea('direccion_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'zapata6']) !!}
		</div>
	</div>
</div>
