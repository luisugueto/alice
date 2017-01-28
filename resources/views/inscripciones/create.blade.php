@extends('welcome')

@section('contentheader_title', 'Inscripción')
@section('contentheader_description', 'Nuevo')

@section('main-content')
                        <?php 

                       $repite=buscar_si_repite($estudiantes->id); 
                       // $repite="SIN CARGAR TODAS";

                        $id_curso=buscar_curso_a_inscribir($estudiantes->id);
                       ?>
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Inscripción</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['route' => 'inscripciones.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    <fieldset>
                        <legend> {{ $estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres }}</legend>

                        @include('inscripciones.forms.create-fields')

                       
                        @if($repite!="SIN CARGAR TODAS" || $id_curso=="Ninguno")
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn">Borrar</button>
                                </div>
                        @endif
                    </fieldset>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

<script type="text/javascript">

function seccion(){
    //alert("hola");
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

    var id = $("#id_curso").val();

    $.get("/inscripciones/rubros/"+id+"/buscar", function(data)
    {
        //alert(data.length);

        $("#id_rubros").empty();

        if (data.length > 0)
        {

            $("#id_rubros").append('<table class="table table-bordered"><thead><tr><th class="text-center">AGREGAR</th><th>NOMBRE DEL RUBRO</th><th>FECHA LÍMITE DE PAGO</th><th class="text-center">MONTO</th></tr></thead><tbody id="rubros"></tbody></table><div id="boton"></div>');

            $.each(data, function(index, typeObj)
            {
                $("#rubros").append('<tr><td class="text-center" width="60"><input type="checkbox" id="id_rubro" name="id_rubro[]"" value='+ typeObj.id +'>'+
                    '</td><td>'+ typeObj.nombre +'</td><td>'+ typeObj.fecha +'</td><td class="text-center">'+ typeObj.monto +'</td></tr></tbody></table>');

            });

        }else{

            $("#rubros").append('<tr><td class="text-center" colspan="4">No se encontraron resultados</td></tr>');
        }
    });
}
</script>