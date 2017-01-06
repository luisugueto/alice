@extends('layouts.app')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Curso: {{ $curso->curso }}</h3>
                    </div>
                    <div class="box-body">
                        @include('horarios.forms.fields-edit')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

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