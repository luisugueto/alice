<div class="form-group">
    {!! Form::label('Nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['required', 'class'=>'form-control', 'placeholder' => 'Secretaria']) !!}
</div>
<div class="form-group">
    {!! Form::label('Area', 'Área') !!}
    {!! Form::select('id_area', $area, null, ['class'=>'form-control']) !!}
</div>