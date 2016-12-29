@extends('layouts.app')

@section('contentheader_title', 'Asignatura')
@section('contentheader_description', 'Editar')

@section('main-content')

<div class="col-md-12">
   
    @include('alerts.errors')
    @include('alerts.request')
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                {!!Form::model($asignaturas, ['route'=>['asignaturas.update', $asignaturas->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $asignaturas->asignatura }}</h3> 
                        </div>
                        <div class="box-body">
                            
                            @include('asignaturas.forms.fields') 

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

@endsection