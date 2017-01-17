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
                <div class="span3"></div>
                <div class="span4">

                    {!! Form::open(['route' => 'pagos.store', 'method' => 'POST', 'class'=>'form-horizontal','name' => 'form', 'id' => 'form', 'onsubmit' => 'return validateForm()']) !!}


                            <div class="box-body">

                                @include('prestamos.forms.register')

                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                                </div>
                            </div>
                    {!! Form::close() !!}

                 </div>
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
