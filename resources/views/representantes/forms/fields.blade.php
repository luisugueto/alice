<div class="tab-pane active" id="tab_1">
	<div class="box-body">
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
				{!! Form::label('cedula_re', 'Cédula') !!} <small class="text-red">*</small>
				{!! Form::text('cedula_re', $cedula_re, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '178455996-9', 'title' => 'Introduzca la cédula del representante', 'disabled' => 'disabled']) !!}
				{!! Form::hidden('cedula_re', $cedula_re) !!}
			</div>
			<div class="form-group">
				{!! Form::label('parentesco', 'Parentesco') !!}
				{!! Form::text('parentesco', null, ['class' => 'form-control', 'title' => 'Introduzca el parentesco del representante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('direccion_re') ? ' has-error' : '' }}">
				{!! Form::label('direccion_re', 'Dirección') !!} <small class="text-red">*</small>
				{!! Form::textarea('direccion_re', null, ['class' => 'form-control', 'title' => 'Introduzca la dirección donde vive el representante', 'placeholder' => '', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('nombres_re') ? ' has-error' : '' }}">
				{!! Form::label('nombres_re', 'Nombre(s)') !!} <small class="text-red">*</small>
				{!! Form::text('nombres_re', null, ['class' => 'form-control', 'title' => 'Introduzca los nombres del representante', 'placeholder' => 'María', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('telefono_re') ? ' has-error' : '' }}">
				{!! Form::label('telefono_re', 'Teléfono de emergencia') !!} <small class="text-red">*</small>
				{!! Form::text('telefono_re', null, ['class' => 'form-control', 'title' => 'Introduzca el número de teléfono del representante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group{{ $errors->has('nacionalidad_re') ? ' has-error' : '' }}">
				{!! Form::label('nacionalidad_re', 'Nacionalidad') !!} <small class="text-red">*</small>
				{!! Form::text('nacionalidad_re', null, ['class' => 'form-control', 'title' => 'Introduzca la nacionalidad del representante', 'placeholder' => 'Ecuador', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
			<div class="form-group{{ $errors->has('vive_con') ? ' has-error' : '' }}">
				{!! Form::label('vive_con', 'Vive con') !!} <small class="text-red">*</small>
				{!! Form::text('vive_con', null, ['class' => 'form-control', 'title' => 'Introduzca con quien vive el representante', 'placeholder' => '', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
			</div>
		</div>
		<div class="col-md-12 text-center">
			<hr>
			<span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
			<br><br>
		</div>
		<div class="col-md-12">
			<div class="box-footer">
		        <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
		        <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
		    </div>
		</div>
	</div>
</div>