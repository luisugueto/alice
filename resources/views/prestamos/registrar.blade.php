@extends('layouts.app')
@section('contentheader_title', 'Pago de Prestamos')

@section('htmlheader_title')
    Pago de Prestamo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    @include('alerts.errors')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          <form action="{{ route('pagos.store') }}" method="POST" id="f1" onsubmit="return validateForm()">
          {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $prestamos->id }}">
            <div class="form-group"> 
              <h4>{!! Form::label('tipo', 'Tipo de Pago ') !!} </h4> 
              {!! Form::label('efectivo', 'Efectivo') !!}
              <input type="checkbox" checked class="checkbox" id="efectivo" name="efectivo">
            </div>
            <div class="form-group">
              {!! Form::label('efectivo', 'Cheque') !!}<input id="cheque" onclick="cheques()" type="checkbox" class="checkbox" name="cheque">
            </div>
            <div class="form-group">
              {!! Form::label('efectivo', 'Transferencia') !!}<input id="transferencia" onclick="transferencias()" type="checkbox" class="checkbox" name="transferencia">
            </div>
            <?php $i = 0; $monto = 0;
                foreach ($prestamos->pagosrealizados as $key) {
                    $i += $key->monto_pagado;
                    $monto = $key->monto_adeudado;
                }
            ?>
            <div class="form-group cheques" style="display:none">
              {!! Form::label('noCheque', 'N° Cheque') !!}
               {!! Form::number('no_cheque', null, ['class' => 'form-control', 'id'=>'noCheque','title' => 'Introduzca el Sueldo Mensual?:']) !!}
            </div>
            <div class="form-group transferencias" style="display:none">
              {!! Form::label('noTransferencia', 'N° Transferencia') !!}
              {!! Form::number('no_transferencia', null, ['class' => 'form-control', 'title' => 'Introduzca el Sueldo Mensual?:', 'id'=>'noTransferencia']) !!}
            </div>
            <div class="form-group"> 
             {!! Form::label('modalidad', 'Modalidad de Pago') !!}
              {!! Form::select('modalidad', array('C' => 'Completo', 'A' => 'Abono'), null, ['class' => 'form-control', 'id'=>'modalidad','required', 'onchange'=>'modalidades()','title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
            </div>
            
            <div class="form-group">
              {!! Form::label('monto', 'Monto') !!}
              {!! Form::number('monto', null, ['max'=>$prestamos->monto-$i, 'min'=>0,'class' => 'form-control','id'=>'monto','title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300.00']) !!}
            </div>
           <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
        </form> 

<script type="text/javascript">

   function validateForm() {
      if(($("#cheque").prop("checked") == false) && ($("#transferencia").prop("checked") == false) && ($("#efectivo").prop("checked") == false))
      {
          alert('Al menos seleccione un tipo de pago.');
          return false;
      }
    }

  function modalidades(){ 
    if( $('#modalidad').val() == 'C' ) {
        $('#monto').attr('disabled', true);
        $('#monto').attr('required', false);
    }else {
        $('#monto').attr('disabled', false);
        $('#monto').attr('required', true);
    }
  }

  function cheques(){
    if($('#cheque').prop('checked')){
      $('#noCheque').attr('required', true);
      $('.cheques').css('display', '');
    }else{ 
      $('.cheques').css('display', 'none');
      $('#noCheque').attr('required', false);
    }
  }

  function transferencias(){
    if($('#transferencia').prop('checked')){
      $("#noTransferencia").attr('required', true);
      $('.transferencias').css('display', '');
    }else {
      $('.transferencias').css('display', 'none');
      $("#noTransferencia").attr('required', false);
    }

  }

  
</script>

@stop