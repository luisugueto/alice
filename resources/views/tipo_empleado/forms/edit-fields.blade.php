
    <div class="control-group">
        {!! Form::label('tipodeempleado','Nombre', ['class'=>'control-label'])!!}
        <div class="controls">
        	{!! Form::text('tipo_empleado',$tipo_empleado->tipo_empleado,['class' => 'input-xlarge','required' => 'required', 'title' => 'Ingrese el nombre del tipo de empleado','placeholder' => 'SECRETARIO(A)', 'style' => 'text-transform:uppercase;', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
    </div>
