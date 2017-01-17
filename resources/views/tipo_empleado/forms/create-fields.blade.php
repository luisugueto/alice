
	<div class="control-group">
		{!! Form::label('tipodeempleado','Nombre',['class'=>'control-label'])!!}
		<div class="controls">
			{!! Form::text('tipo_empleado',null,['class' => 'input-xlarge','required' => 'required', 'title' => 'Ingrese el nombre del tipo de empleado','placeholder' => 'SECRETARIO(A)', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
		</div>
	</div>
