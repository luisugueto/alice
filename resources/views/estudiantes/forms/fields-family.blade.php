<div id="contenido">
	@if($padre == 0)
	<div class="col-md-12">
		<div class="pull-right">
			<div class="form-group">
			{!! Form::label('habilitar', 'HABILITAR') !!} &nbsp;
			<input type="checkbox" onclick="padre_ch()" id="habilitar" name="padre">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('cedula_pa') ? ' has-error' : '' }}">
			{!! Form::label('cedula_pa', 'Cédula') !!} <small class="text-red">*</small>
			{!! Form::text('cedula_pa', null, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('nacionalidad_pa') ? ' has-error' : '' }}">
			{!! Form::label('nacionalidad_pa', 'Nacionalidad') !!} <small class="text-red">*</small>
			{!! Form::text('nacionalidad_pa', null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombres_pa') ? ' has-error' : '' }}">
			{!! Form::label('nombres_pa', 'Nombres') !!} <small class="text-red">*</small>
			{!! Form::text('nombres_pa', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('telefono_pa') ? ' has-error' : '' }}">
			{!! Form::label('telefono_pa', 'Teléfono') !!} <small class="text-red">*</small>
			{!! Form::text('telefono_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('nivel_educacion', 'Nivel de educación') !!}
			{!! Form::select('nivel_educacion', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('correo_pa') ? ' has-error' : '' }}">
			{!! Form::label('correo_pa', 'Correo') !!} <small class="text-red">*</small>
			{!! Form::email('correo_pa', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group{{ $errors->has('lugar_trabajo') ? ' has-error' : '' }}">
			{!! Form::label('lugar_trabajo', 'Lugar trabajo') !!} <small class="text-red">*</small>
			{!! Form::textarea('lugar_trabajo', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('direccion_pa') ? ' has-error' : '' }}">
			{!! Form::label('direccion_pa', 'Dirección') !!} <small class="text-red">*</small>
			{!! Form::textarea('direccion_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	@else
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('cedula_pa') ? ' has-error' : '' }}">
			{!! Form::label('cedula_pa', 'Cédula') !!} <small class="text-red">*</small>
			{!! Form::text('cedula_pa', $padre->cedula_pa, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('nacionalidad_pa') ? ' has-error' : '' }}">
			{!! Form::label('nacionalidad_pa', 'Nacionalidad') !!} <small class="text-red">*</small>
			{!! Form::text('nacionalidad_pa', $padre->nacionalidad_pa, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombres_pa') ? ' has-error' : '' }}">
			{!! Form::label('nombres_pa', 'Nombres') !!} <small class="text-red">*</small>
			{!! Form::text('nombres_pa', $padre->nombres_pa, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('telefono_pa') ? ' has-error' : '' }}">
			{!! Form::label('telefono_pa', 'Teléfono') !!} <small class="text-red">*</small>
			{!! Form::text('telefono_pa', $padre->telefono_pa, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('nivel_educacion', 'Nivel de educación') !!}
			{!! Form::text('nivel_educacion', $padre->nivel_educacion, ['class' => 'form-control', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('correo_pa') ? ' has-error' : '' }}">
			{!! Form::label('correo_pa', 'Correo') !!} <small class="text-red">*</small>
			{!! Form::email('correo_pa', $padre->correo_pa, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group{{ $errors->has('lugar_trabajo') ? ' has-error' : '' }}">
			{!! Form::label('lugar_trabajo', 'Lugar trabajo') !!} <small class="text-red">*</small>
			{!! Form::textarea('lugar_trabajo', $padre->lugar_trabajo, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('direccion_pa') ? ' has-error' : '' }}">
			{!! Form::label('direccion_pa', 'Dirección') !!} <small class="text-red">*</small>
			{!! Form::textarea('direccion_pa', $padre->direccion_pa, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	@endif
	<div class="col-md-12">
		<hr>
	</div>
	@if($madre == 0)
	<div class="col-md-12">
		<div class="pull-right">
			<div class="form-group">
			{!! Form::label('habilitar', 'HABILITAR') !!} &nbsp;
			<input type="checkbox" onclick="padre_ch2()" id="habilitar2" name="padre2">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('cedula_ma') ? ' has-error' : '' }}">
			{!! Form::label('cedula_ma', 'Cédula') !!} <small class="text-red">*</small>
			{!! Form::text('cedula_ma', null, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('nacionalidad_ma') ? ' has-error' : '' }}">
			{!! Form::label('nacionalidad_ma', 'Nacionalidad') !!} <small class="text-red">*</small>
			{!! Form::text('nacionalidad_ma', null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombres_ma') ? ' has-error' : '' }}">
			{!! Form::label('nombres_ma', 'Nombres') !!} <small class="text-red">*</small>
			{!! Form::text('nombres_ma', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('telefono_ma') ? ' has-error' : '' }}">
			{!! Form::label('telefono_ma', 'Teléfono') !!} <small class="text-red">*</small>
			{!! Form::text('telefono_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('nivel_educacion_ma', 'Nivel de educación') !!}
			{!! Form::select('nivel_educacion_ma', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('correo_ma') ? ' has-error' : '' }}">
			{!! Form::label('correo_ma', 'Correo') !!} <small class="text-red">*</small>
			{!! Form::email('correo_ma', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group{{ $errors->has('lugar_trabajo_ma') ? ' has-error' : '' }}">
			{!! Form::label('lugar_trabajo_ma', 'Lugar trabajo') !!} <small class="text-red">*</small>
			{!! Form::textarea('lugar_trabajo_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('direccion_ma') ? ' has-error' : '' }}">
			{!! Form::label('direccion_ma', 'Dirección') !!} <small class="text-red">*</small>
			{!! Form::textarea('direccion_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	@else
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('cedula_ma') ? ' has-error' : '' }}">
			{!! Form::label('cedula_ma', 'Cédula') !!} <small class="text-red">*</small>
			{!! Form::text('cedula_ma', $madre->cedula_pa, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('nacionalidad_ma') ? ' has-error' : '' }}">
			{!! Form::label('nacionalidad_ma', 'Nacionalidad') !!} <small class="text-red">*</small>
			{!! Form::text('nacionalidad_ma', null, ['class' => 'form-control', 'placeholder' => 'Ecuador', 'title' => 'Introduzca la nacionalidad del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombres_ma') ? ' has-error' : '' }}">
			{!! Form::label('nombres_ma', 'Nombres') !!} <small class="text-red">*</small>
			{!! Form::text('nombres_ma', $madre->nombres_pa, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('telefono_ma') ? ' has-error' : '' }}">
			{!! Form::label('telefono_ma', 'Teléfono') !!} <small class="text-red">*</small>
			{!! Form::text('telefono_ma', $madre->telefono_pa, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('nivel_educacion_ma', 'Nivel de educación') !!}
			{!! Form::text('nivel_educacion_ma', $madre->nivel_educacion, ['class' => 'form-control', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('correo_ma') ? ' has-error' : '' }}">
			{!! Form::label('correo_ma', 'Correo') !!} <small class="text-red">*</small>
			{!! Form::email('correo_ma', $madre->correo_pa, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group{{ $errors->has('lugar_trabajo_ma') ? ' has-error' : '' }}">
			{!! Form::label('lugar_trabajo_ma', 'Lugar trabajo') !!} <small class="text-red">*</small>
			{!! Form::textarea('lugar_trabajo_ma', $madre->lugar_trabajo, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form-group{{ $errors->has('direccion_ma') ? ' has-error' : '' }}">
			{!! Form::label('direccion_ma', 'Dirección') !!} <small class="text-red">*</small>
			{!! Form::textarea('direccion_ma', $madre->direccion_pa, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
		</div>
	</div>
	@endif
</div>
