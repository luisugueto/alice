@extends('welcome')

@section('contentheader_title', 'QUIMESTRE')
@section('contentheader_description', 'CALIFICACIONES CARGADAS')


@section('main-content')  

 <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><strong>MATRÍCULA NRO: </strong>{{ strtoupper($estudiantes->codigo_matricula)}}</div>
            <a href="{{ route('quimestre.pdf', [$i, $id_estudiante,$tipo_user]) }}" class="btn pull-right"><i class="icon-print"></i></a>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>{{ strtoupper($estudiantes->apellidos.', '. $estudiantes->nombres) }}</legend>

                        @include('parciales.forms.mostrar-quimestre-fields')

                    </fieldset>
               

            </div>
        </div>
    </div>

          
@stop
