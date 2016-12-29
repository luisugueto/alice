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

                    {!! Form::open(['route' => 'horarios.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box-body">

                        @include('horarios.forms.fields')

                        {!! Form::hidden('id_curso', $curso->id) !!}
                        {!! Form::hidden('id_seccion', $seccion->id) !!}
                        {!! Form::hidden('id_asig', $asignatura->id) !!}
                        {!! Form::hidden('id_aula', $aula->id) !!}

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection