@extends('layouts.app')

@section('contentheader_title', 'Facturación')
@section('contentheader_description', 'Nuevo')

@section('main-content')

<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['route' => 'facturaciones.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $estudiante->cedula }}</h3>
                        </div>
                        <div class="box-body">
                            
                            @include('facturaciones.forms.fields')   
                            
                        </div>   
                    </div>

                {!! Form::close() !!}

          
@endsection

<script type="text/javascript">

    function seccion()
    {

       var id = $("#id_curso").val();
        
        $.get("/inscripciones/rubros/"+id+"/buscar", function(data)
        {
            
            $("#id_rubros").empty();                 
                
                if (data.length > 0) 
                {
                     $("#id_rubros").append('<table class="table table-bordered"><thead><tr><th class="text-center">AGREGAR</th><th>NOMBRE DEL RUBRO</th><th>FECHA LÍMITE DE PAGO</th><th class="text-center">MONTO</th></tr></thead><tbody id="rubros"></tbody></table><div id="boton"></div>');

                    $.each(data, function(index, typeObj)
                    {
                        $("#rubros").append('<tr><td class="text-center" width="60"><input type="checkbox" id="id_rubro" name="id_rubro[]"" value='+ typeObj.id +'>'+
                                                '</td><td>'+ typeObj.nombre +'</td><td>'+ typeObj.fecha +'</td><td class="text-center">'+ typeObj.monto +'</td></tr></tbody></table>');

                    });

                    $("#boton").append('<div class="box-footer"><button type="reset" class="btn btn-default btn-flat">Cancelar</button><button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button></div>');

                }else{

                    $("#rubros").append('<tr><td class="text-center" colspan="4">No se encontraron resultados</td></tr>');
                }
        });
    }
</script>