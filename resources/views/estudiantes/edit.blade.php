@extends('layouts.app')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Editar')

@section('main-content')
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">


                {!!Form::model($estudiante, ['route'=>['estudiantes.update', $estudiante->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Estudiante {{ $estudiante->nombres }}</h3> 
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Foto</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Generales</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Medicos</a></li>
                                    <!-- <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Novedades</a></li> -->
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    @include('estudiantes.forms.fields-edit')
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}
@endsection
