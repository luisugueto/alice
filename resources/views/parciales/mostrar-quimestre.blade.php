@extends('welcome')

@section('contentheader_title', 'QUIMESTRE')
@section('contentheader_description', 'CALIFICACIONES CARGADAS')


@section('main-content')  

 <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Estudiante</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>{{ $estudiantes->apellidos }}, {{ $estudiantes->nombres }}
                            <strong>MATRÍCULA NRO: </strong>{{$estudiantes->codigo_matricula}}</legend>

                        @include('parciales.forms.mostrar-quimestre-fields')

                    </fieldset>
               

            </div>
        </div>
    </div>

          
@stop
