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
<div class="form-group"> 
    {!! Form::label('modalidad', 'Modalidad de Pago') !!} <small class="text-red">*</small>
    {!! Form::select('modalidad', $modalidad, null, ['class' => 'form-control', 'id'=>'modalidad','required', 'onchange'=>'modalidades()','title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
</div>      
<div class="col-md-12">
    <hr>
</div>
<div class="form-group"> 
    <div class="col-md-12">
    @foreach($forma as $for)
        {{ Form::label('Tipo', $for->forma) }}
        <input type="checkbox" class="checkbox" onclick="{{ $for->forma }}s()" id="{{ $for->forma }}" name="{{ $for->forma }}">
    @endforeach
    </div>
</div>
<div class="col-md-12">
    <hr>
</div>
<div class="form-group transferencias" style="display:none">
    {!! Form::label('noTransferencia', 'Nro. de Transferencia') !!} <small class="text-red">*</small>
    {!! Form::number('no_transferencia', null, ['class' => 'form-control', 'placeholder' => '316600804465', 'title' => 'Introduzca el Número de Transferencia:', 'id'=>'noTransferencia']) !!}
</div>
<div class="form-group cheques" style="display:none">
    {!! Form::label('noCheque', 'Nro. de Cheque') !!} <small class="text-red">*</small>
    {!! Form::number('no_cheque', null, ['class' => 'form-control', 'id'=>'noCheque', 'placeholder' => '011234567 001234567', 'title' => 'Introduzca el número del cheque']) !!}
</div>
<div class="form-group">
    {!! Form::label('monto', 'Monto') !!} <small class="text-red">*</small>
    {!! Form::number('monto', null, ['max'=>$prestamos->monto-$i, 'min'=>0,'class' => 'form-control','id'=>'monto','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => '300.00']) !!}
</div>