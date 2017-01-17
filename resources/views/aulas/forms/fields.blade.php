<div class="control-group">
    {!! Form::label('Nombre', 'Número', ['class'=>'control-label']) !!}
    <div class="controls">
    	{!! Form::text('nombre', null, ['required', 'class'=>'input-xlarge', 'placeholder' => '001', 'title' => 'Ingrese el literal o el número del aula', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>