@extends('welcome')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content')
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Horarios</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>Curso: {{ $curso->curso }}</legend>

                    {!! Form::open(['route' => 'horarios.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box-body">

                        @include('horarios.forms.fields')

                        {!! Form::hidden('id_curso', $curso->id) !!}
                        {!! Form::hidden('id_seccion', $seccion->id) !!}
                        {!! Form::hidden('id_asig', $asignatura->id) !!}
                        {!! Form::hidden('id_aula', $aula->id) !!}

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}
                </fieldset>

            </div>
        </div>
    </div>

@endsection