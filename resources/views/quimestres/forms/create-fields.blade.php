<div class="form-group">
	{!! Form::label('inicio','Inicio') !!}
	{!! Form::date('inicio', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de inicio del quimestre', 'placeholder' => '']) !!}
</div>

<div class="form-group">
	{!! Form::label('fin','Fin') !!}
	{!! Form::date('fin', null, ['class' => 'form-control', 'title' => 'Introduzca la fecha de finailzación del quimestre', 'placeholder' => '']) !!}
</div>

<div class="form-group">
	{!! Form::label('Periodo','Periodo') !!}
	{!! Form::select('inicio', $periodos, ['class' => 'form-control', 'title' => 'Seleccione el periodo al cual asignará el quimestre', 'placeholder' => '']) !!}
</div>