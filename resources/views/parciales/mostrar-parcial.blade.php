@extends('welcome')

<?php
        $parcial=buscar($estudiantes->id);
?>

@section('contentheader_title', 'Parciales')
@section('contentheader_description', 'CALIFICACIONES  CARGADAS DEL PARCIAL SELECCIONADO')

@section('main-content')  

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"> PARCIAL </div>
            <a class="btn pull-right" href="{{ route('parciales.pdf', [$i,$id_estudiante]) }}"><i class="icon-print"></i></a>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                
                <form action="{{ route('parciales.store') }}" method="POST" id="f1" name="f1">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>  {{ $estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}
                        <strong>MATRÍCULA NRO: </strong>{{$estudiantes->codigo_matricula }}</legend>

                        @include('parciales.forms.mostrar-parcial-fields')

                        
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

@endsection