@extends('layouts.app')
@if($docentes->cargo->nombre=="DOCENTE DE PLANTA")
@section('contentheader_title', 'Asignando Curso/Sección')
@else
@section('contentheader_title', 'Asignando Curso/Asignatura/Sección')

@endif
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
                        &nbsp;&nbsp;&nbsp;&nbsp;  Docente:{{ $docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres."  C.I.: ".$docentes->cedula }}<br>
                              Lista de Asignaturas y Secciones asignadas
                    </div>
                    <div class="box-body">
                     {!! Form::open(['route' => 'docentes.store', 'method' => 'POST', 'class' => 'form']) !!}
                        @include('docentes.forms.create-fields') 
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
                    $.get("/docentes/secciones/"+id+"/buscar", function(data) 
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
function secciones2(){

   var id = $("#id_curso").val();
                    $.get("/docentes/secciones/"+id+"/buscar", function(data) 
                    {
                        $("#id_seccion2").empty();
                        $("#id_seccion2").append('<option value="" selected disabled> Seleccione </option>');

                        if(data.length > 0){

                            for (var i = 0; i < data.length ; i++) 
                            {  
                                $("#id_seccion2").removeAttr('disabled');
                                $("#id_seccion2").append('<option value="'+ data[i].id + '">' + data[i].literal +'</option>');
                            }

                        }else{
                            
                            $("#id_seccion2").attr('disabled', false);

                        }
                    });
                    $.get("/docentes/asignaturas/"+id+"/buscar2", function(data) 
                    {
                        $("#id_asignatura").empty();
                        $("#id_asignatura").append('<option value="" selected disabled> Seleccione </option>');

                        if(data.length > 0){

                            for (var i = 0; i < data.length ; i++) 
                            {  
                                $("#id_asignatura").removeAttr('disabled');
                                $("#id_asignatura").append('<option value="'+ data[i].id + '">' + data[i].asignatura +'</option>');
                            }

                        }else{
                            
                            $("#id_asignatura").attr('disabled', false);

                        }
                    });


}



</script>