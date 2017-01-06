@extends('layouts.app')

@section('contentheader_title', 'Asignatura')
@section('contentheader_description', 'Editar')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $asignaturas->asignatura }}</h3>
                    </div>

                    {!!Form::model($asignaturas, ['route'=>['asignaturas.update', $asignaturas->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box-body">

                        @include('asignaturas.forms.fields')

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection