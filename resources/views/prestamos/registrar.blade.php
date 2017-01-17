@extends('welcome')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Pago')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Prestamos y Anticipos</div>
            </div>
            <div class="block-content collapse in">
                    {!! Form::open(['route' => 'pagos.store', 'method' => 'POST', 'class'=>'form-horizontal','name' => 'form', 'id' => 'form', 'onsubmit' => 'return validateForm()']) !!}

                                @include('prestamos.forms.register')

                                <div class="form-actions">
                                    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                                </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
        

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

@endsection
