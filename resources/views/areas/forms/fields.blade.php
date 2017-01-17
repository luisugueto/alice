<div class="control-group">
    {!! Form::label('Nombre', 'Nombre', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('nombre', null, ['required', 'class'=>'input-xlarge', 'placeholder' => 'Administración', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>
