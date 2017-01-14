@extends('layouts.app')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Nuevo')

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
                        <h3 class="box-title">Estudiante</h3>
                    </div>

                    {!! Form::open(['route' => 'estudiantes.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'files' => true]) !!}

                    <div class="box-body">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_0" data-toggle="tab" aria-expanded="true">Foto</a></li>
                                <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Generales</a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Familiares</a></li>
                                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Medicos</a></li>
                                <!-- <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Novedades</a></li> -->
                                <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Rubros</a></li>
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">
                                @include('estudiantes.forms.fields')
                            </div>
                        </div>
                        <div class="text-center">
                            <span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
                        </div><br>

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
