<div class="span1">
</div>
<div class="span4">
	<div class="control-group">
		{!! Form::label('cedula_re', 'Cédula', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
			{!! Form::text('cedula_re', $cedula_re, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '178455996-9', 'title' => 'Introduzca la cédula del representante', 'disabled' => 'disabled']) !!}
			{!! Form::hidden('cedula_re', $cedula_re) !!}
			{!! Form::hidden('nacionalidad_ce', $nacionalidad_ce) !!}
		</div>
	</div>
	<div class="control-group">
		{!! Form::label('nombres_re', 'Nombre(s)', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('nombres_re') ? ' has-error' : '' }}">
			{!! Form::text('nombres_re', null, ['class' => 'form-control', 'title' => 'Introduzca los nombres del representante', 'placeholder' => 'María', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
		</div>
	</div>
	<div class="control-group">
		{!! Form::label('telefono_re', 'Teléfono', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('telefono_re') ? ' has-error' : '' }}">
		{!! Form::text('telefono_re', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del representante', 'placeholder' => '', 'id' => 'phone']) !!}
		</div>
	</div>
	<div class="control-group">
		{!! Form::label('direccion_re', 'Dirección', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('direccion_re') ? ' has-error' : '' }}">
			{!! Form::textarea('direccion_re', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el representante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
		</div>
	</div>
</div>
<div class="span3">
	<div class="control-group">
		{!! Form::label('parentesco', 'Parentesco', ['class' => 'control-label']) !!}
		<div class="controls">
			{!! Form::select('parentesco', array('Padres' => 'Padres', 'Hijos' => 'Hijos', 'Hermanos' => 'Hermanos', 'Abuelos' => 'Abuelos') ,null, ['class' => 'form-control', 'title' => 'Introduzca el parentesco del representante', 'placeholder' => 'Seleccione']) !!}
		</div>
	</div>
	<div class="control-group">
		{!! Form::label('nacionalidad_re', 'Nacionalidad', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('nacionalidad_re') ? ' has-error' : '' }}">
			{!! Form::text('nacionalidad_re', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del representante', 'placeholder' => 'Ecuador', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
		</div>
	</div>
	<div class="control-group">
		{!! Form::label('vive_con', 'Vive con', ['class' => 'control-label']) !!}
		<div class="controls{{ $errors->has('vive_con') ? ' has-error' : '' }}">
			{!! Form::text('vive_con', null, ['class' => 'form-control', 'title' => 'Introduzca con quien vive el representante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
		</div>
	</div>
</div>

{!! Form::hidden('padre', $padre) !!}
{!! Form::hidden('madre', $madre) !!}

<div class="span12 text-center">
	<hr>
	<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
</div>
