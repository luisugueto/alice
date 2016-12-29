@extends('layouts.app')

@section('contentheader_title', 'Personal')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">

                {!! Form::open(['route' => 'personal.store', 'method' => 'POST', 'name' => 'f1', 'id' => 'f1']) !!}

                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#generales" aria-expanded="true">Datos Generales</a></li>
                                <li><a data-toggle="tab" href="#academica" aria-expanded="false">Información Académica</a></li>
                                <li><a data-toggle="tab" href="#remuneracion" aria-expanded="false">Remuneración</a></li>
                                <li class="pull-right"><a href="#" class="text-muted" ><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">

                                @include('personal.forms.fields')

                                <div class="text-center">
                                    <span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
                                </div>

                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection