@extends('welcome')

@section('contentheader_title', 'Usuario')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Horario</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>{{ $docente->nombres }}, {{ $docente->apellido_paterno }}</legend>

                    {!! Form::open(['route' => 'horario.profesor', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}

                    @include('docentes.forms.fields-horario')

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <button type="reset" class="btn">Borrar</button>
                    </div>

                    {!! Form::close() !!}

                </fieldset>

            </div>
        </div>
    </div>

@endsection
