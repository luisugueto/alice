<div class="box-body">
    <div class="form-group">
        {!! Form::label('tipodeempleado','Nombre')!!}
        {!! Form::text('tipo_empleado',$tipo_empleado->tipo_empleado,['class' => 'form-control','required' => 'required', 'title' => 'Ingrese el nombre del tipo de empleado','placeholder' => 'SECRETARIO(A)', 'style' => 'text-transform:uppercase;', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
</div>