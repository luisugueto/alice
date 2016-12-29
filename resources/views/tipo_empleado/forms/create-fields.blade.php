
	<div class="form-group">
		{!! Form::label('tipodeempleado','Nombre')!!}
		{!! Form::text('tipo_empleado',null,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el nombre del tipo de empleado','placeholder' => 'SECRETARIO(A)', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
	</div>
