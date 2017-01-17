@extends('welcome')

@section('contentheader_title', 'Facturación')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Facturación</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>{{ $estudiante->nombres.' '.$estudiante->apellidos }}</legend>

                    {!! Form::open(['route' => 'facturaciones.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}

                    @include('facturaciones.forms.fields')

                    {!! Form::close() !!}

                </fieldset>

            </div>
        </div>
    </div>

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