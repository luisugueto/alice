@extends('layouts.app')

@section('contentheader_title', 'Inscripción')
@section('contentheader_description', '')

@section('main-content') 

<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
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

@endsection
<script type="text/javascript">
function seccion(){

   var id = $("#id_curso").val();
    $.get("/inscripciones/secciones/"+id+"/buscar", function(data) 
    {
        $("#id_seccion").empty();
        /*$("#id_seccion").append('<option value="" selected disabled> Seleccione </option>');*/
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
    $.get("/inscripciones/rubros/"+id+"/buscar",function(data){
        $("#id_rubros").empty();
        $("#id_rubros").append("<table class='table'>"+
                                "<thead>"+
                                    "<th>Agregar</th>"+
                                    "<th>Nombre del Rubro</th>"+
                                    "<th>Fecha límite de Pago</th>"+
                                    "<th>Monto</th>"+
                                "</thead>"+
                                "<tbody>");                    
            
            if (data.length>0) {
                for (var j = 0; j < data.length ; j++) 
                {
                            $("#id_rubros").append("<div class='col-md-12'> <table class='table table-bordered table-hover'><tbody><tr aling='center'><td aling='center'  width='60'><input type='checkbox' id='id_rubro' name='id_rubro[]' value='"+ data[j].id +"'></td>"+
                                "<td width='400' aling='center'>" + data[j].nombre +"</td><td aling='center'>" + data[j].fecha +"</td><td aling='center'>" + data[j].monto + "</td></tr></tbody></table></div>");
                 
                }

            };
      
        $("#id_rubros").append('</tbody></table>');
    });
}
</script>