<div class="form-group">
    {!! Form::label('Nombre', 'Áera') !!}
    {!! Form::text('nombre', null, ['required', 'class'=>'form-control', 'placeholder' => 'Administración', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
