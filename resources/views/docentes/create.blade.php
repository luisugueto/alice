@extends('welcome')

@if($docentes->cargo->nombre=="DOCENTE DE PLANTA")

@section('contentheader_title', 'Asignando Curso')

@else

@section('contentheader_title', 'Asignando Curso / Asignatura')

@endif

@section('contentheader_description', 'Sección')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Docente</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                {!! Form::open(['route' => 'docentes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                    <fieldset>
                        <legend>{{ $docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres."  C.I.: ".$docentes->cedula }}</legend>

                        @include('docentes.forms.create-fields')

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn">Borrar</button>
                        </div>
                    </fieldset>

                {!! Form::close() !!}

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