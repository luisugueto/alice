<input type="hidden" name="id" value="{{ $prestamos->id }}">
<?php 
$i = 0; 
$monto = 0;
    
    foreach ($prestamos->pagosrealizados as $key) 
    {
        $i += $key->monto_pagado;
        $monto = $key->monto_adeudado;
    }
?>
<div class="control-group">
    {!! Form::label('modalidad', 'Modalidad de Pago', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::select('modalidad', $modalidad, null, ['class' => 'form-control', 'id'=>'modalidad','required', 'onchange'=>'modalidades()','title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
    </div>
</div>
<div class="span12">
    <hr>
</div>
<div class="control-group">
    @foreach($forma as $for)
    <div class="span2">
        {{ Form::label('Tipo', $for->forma, ['class'=>'control-label']) }}
        &nbsp;<input type="checkbox" class="checkbox" onclick="{{ $for->forma }}s()" id="{{ $for->forma }}" name="{{ $for->forma }}">
    </div>
    @endforeach
</div>
<div class="control-group">
    <hr>
</div>
<div class="control-group transferencias" style="display:none">
    {!! Form::label('noTransferencia', 'Nro. de Transferencia', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::number('no_transferencia', null, ['class' => 'form-control', 'placeholder' => '316600804465', 'title' => 'Introduzca el Número de Transferencia:', 'id'=>'noTransferencia']) !!}
    </div>
</div>
<div class="control-group cheques" style="display:none">
    {!! Form::label('noCheque', 'Nro. de Cheque', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::number('no_cheque', null, ['class' => 'form-control', 'id'=>'noCheque', 'placeholder' => '011234567 001234567', 'title' => 'Introduzca el número del cheque']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('monto', 'Monto', ['class'=>'control-label']) !!}
    <div class="controls">
        {!! Form::number('monto', null, ['max'=>$prestamos->monto-$i, 'min'=>0,'class' => 'form-control','id'=>'monto','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => '300.00']) !!}
    </div>
</div>