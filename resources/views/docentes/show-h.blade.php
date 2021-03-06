@extends('welcome')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Profesor')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">HORARIO CORRESPONDIENTE AL PERIODO ( {{ $periodo->nombre }} ) [CÓDIGO] [SECCIÓN] [AULA]</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>{{ $docente->nombres }}, {{ $docente->apellido_paterno }}</legend>

                    {!! Form::open(['route' => 'horario.profesor', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}

                    @include('docentes.forms.fields-horario')

                    {!! Form::close() !!}

                </fieldset>

            </div>
        </div>
    </div>

@endsection
