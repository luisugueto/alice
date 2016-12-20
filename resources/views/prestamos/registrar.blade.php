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
            @include('prestamos.forms.register')
           <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
        </form> 

<script type="text/javascript">

   function validateForm() {
      if(($("#Cheque").prop("checked") == false) && ($("#Transferencia").prop("checked") == false) && ($("#Efectivo").prop("checked") == false))
      {
          alert('Al menos seleccione un tipo de pago.');
          return false;
      }
    }

  function modalidades(){ 
    
    if( $('#modalidad').val() == 1 ) {
        $('#monto').attr('disabled', true);
        $('#monto').attr('required', false);
    }else {
        $('#monto').attr('disabled', false);
        $('#monto').attr('required', true);
    }
  }

  function Efectivos(){

  }

  function Cheques(){
    if($('#Cheque').prop('checked')){
      $('#noCheque').attr('required', true);
      $('.cheques').css('display', '');
    }else{ 
      $('.cheques').css('display', 'none');
      $('#noCheque').attr('required', false);
    }
  }

  function Transferencias(){
    if($('#Transferencia').prop('checked')){
      $("#noTransferencia").attr('required', true);
      $('.transferencias').css('display', '');
    }else {
      $('.transferencias').css('display', 'none');
      $("#noTransferencia").attr('required', false);
    }

  }

  
</script>

@stop