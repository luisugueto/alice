@extends('layouts.app')

@if($docentes->cargo->nombre=="DOCENTE DE PLANTA")
@section('contentheader_title', 'Asignando Coordinación de Curso')
@else
@section('contentheader_title', 'Asignando Coordinación de Curso')

@endif
@section('contentheader_description', '')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Asignación de Coordinación de Curso </h3> <br>
                        <h3 class="box-title">Docente:{{ $docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres."  C.I.: ".$docentes->cedula }}</h3>
                    </div>

                    {!! Form::open(['route' => 'docentes.store2', 'method' => 'POST', 'class' => 'form']) !!}

                    <div class="box-body">

                        @include('docentes.forms.create2-fields')

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