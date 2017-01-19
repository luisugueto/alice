@extends('welcome')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Ver')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiante</div>
            </div>
            <div class="block-content collapse in">

                <legend> {{ $estudiante->nombres }}, {{ $estudiante->apellidos }}</legend>

                @include('estudiantes.forms.fields-show')

            </div>
        </div>
    </div>

@endsection