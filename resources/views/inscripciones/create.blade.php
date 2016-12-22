@extends('layouts.app')

@section('contentheader_title', 'Inscripción')
@section('contentheader_description', '')

@section('main-content') 

<div class="col-md-12"><br><br>  
    <section class="content">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Inscripción del Estudiante:<br>
                        {{$estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}<br>
                        <strong>Matrícula Nro: </strong>{{$estudiantes->codigo_matricula}}<br>

                        @foreach($edad as $edad)
                        <strong>Edad: </strong>{{$edad->edad}} años
                        @endforeach
                        </h3>
                    </div>
                    <div class="box-body">
                     {!! Form::open(['route' => 'inscripciones.store', 'method' => 'POST', 'class' => 'form']) !!}
                        @include('inscripciones.forms.create-fields') 
                        {!!Form::close()!!} 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
<script type="text/javascript">
function secciones(){

   var id = $("#id_curso").val();
                    $.get("/inscripciones/secciones/"+id+"/buscar", function(data) 
                    {
                        $("#id_seccion").empty();
                        $("#id_seccion").append('<option value="" selected disabled> Seleccione </option>');

                        if(data.length > 0){

                            for (var i = 0; i < data.length ; i++) 
                            {  
                                $("#id_seccion").removeAttr('disabled');
                                $("#id_seccion").append('<option value="'+ data[i].id + '">' + data[i].literal +'</option>');
                            }

                        }else{
                            
                            $("#id_seccion").attr('disabled', false);

                        }
                    });
                    


}
</script>