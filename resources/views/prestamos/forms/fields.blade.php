<div class="control-group">
    {!! Form::label('Personal', 'Personal', ['class'=>'control-label']) !!}
    <div class="controls">
        <select name="personal" required class="form-control select">
            @foreach($personal as $per)
                <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="control-group">
    {!! Form::label('Tipo', 'Tipo', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::select('tipo', array('P' => 'Prestamo', 'A' => 'Anticipo'), null, ['class' => 'form-control', 'required','title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('Monto', 'Monto', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::number('monto', null, ['required','class' => 'form-control', 'title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300.00']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('Motivo', 'Motivo', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::textarea('motivo', null, ['minlength'=>'10','class' => 'form-control', 'title' => 'Introduzca el Motivo', 'placeholder' => 'Ejm: Deudas', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>
</div>