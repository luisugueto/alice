<div class="form-group">
    {!! Form::label('Nombre', 'Número') !!}
    {!! Form::text('nombre', null, ['required', 'class'=>'form-control', 'placeholder' => '001', 'title' => 'Ingrese el literal o el número del aula', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>