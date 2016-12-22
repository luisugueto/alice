<div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
	{!! Form::label('inicio','Inicio') !!}
	{!! Form::date('inicio', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de inicio del quimestre', 'placeholder' => '']) !!}
</div>

<div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
	{!! Form::label('fin','Fin') !!}
	{!! Form::date('fin', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de finailzación del quimestre', 'placeholder' => '']) !!}
</div>
<div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
	{!! Form::label('numero','Número') !!} <br>

	{!! Form::radio('numero',1,true, ['title' => 'Seleccione si el número para el periodo será el 1']) !!} &nbsp;&nbsp;1er&nbsp;&nbsp;

	{!! Form::radio('numero',2, false,['title' => 'Seleccione si el número para el periodo será el 2']) !!} &nbsp;&nbsp;2do
	
</div>

<div class="form-group">
	{!! Form::label('Periodo','Periodo') !!}
	{!! Form::select('id_periodo', $periodos, null, ['class' => 'form-control', 'title' => 'Seleccione el periodo al cual asignará el quimestre']) !!}
</div>
