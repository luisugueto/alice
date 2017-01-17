<div class="span2"></div>
<div class="span4">
<div class="control-group">
    {!! Form::label('inicio','Inicio', ['class' => 'control-label']) !!}
    <div class="controls{{ $errors->has('inicio') ? ' has-error' : '' }}">
        {!! Form::date('inicio', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de inicio del quimestre', 'placeholder' => '']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('fin','Fin', ['class' => 'control-label']) !!}
    <div class="controls{{ $errors->has('fin') ? ' has-error' : '' }}">
        {!! Form::date('fin', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de finailzación del quimestre', 'placeholder' => '']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('numero','Número', ['class' => 'control-label']) !!}
    <div class="controls{{ $errors->has('fin') ? ' has-error' : '' }}">
        {!! Form::radio('numero',1,true, ['title' => 'Seleccione si el número para el periodo será el 1']) !!} &nbsp;&nbsp;1er&nbsp;&nbsp;

        {!! Form::radio('numero',2, false,['title' => 'Seleccione si el número para el periodo será el 2']) !!} &nbsp;&nbsp;2do

    </div>
</div>
<div class="control-group">
    {!! Form::label('Periodo','Periodo', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::select('id_periodo', $periodos, null, ['class' => 'form-control', 'title' => 'Seleccione el periodo al cual asignará el quimestre']) !!}
    </div>
</div>
</div>
</div>
