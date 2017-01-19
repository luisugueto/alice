@extends('welcome')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content')
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Horario</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>Curso: {{ $curso->curso }}</legend>

                    <div class="box-body">

                        @include('horarios.forms.fields-edit')

                        <div class="form-actions">
                            <button class="btn btn-primary btn-flat" onclick="javascript:history.back()">Regresar</button>
                        </div>

                    </div>
                </fieldset>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        function eliminar(curso, asignatura, bloque, aula, seccion)
        {

            console.log(asignatura);
            $('#seccion').val(seccion);
            $('#curso').val(curso);
            $('#asignatura').val(asignatura);
            $('#bloque').val(bloque);
            $('#aula').val(aula);
        }

    </script>

@endsection
