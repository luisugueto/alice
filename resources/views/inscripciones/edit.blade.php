@extends('layouts.app')

@section('contentheader_title', 'Cambio de Sección')
@section('contentheader_description', '')

@section('main-content')

<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cambio de Sección del Estudiante:<br>
                        {{$estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}<br>
                        <strong>Matrícula Nro: </strong>{{$estudiantes->codigo_matricula}}<br>

                        </h3>
                    </div>
                    <div class="box-body">
                     {!!Form::model($estudiantes, ['route'=>['inscripciones.update', $estudiantes->id], 'method'=>'PUT', 'files' => true])!!}

                        @include('inscripciones.forms.edit-fields') 
                        {!!Form::close()!!} 
                    </div>
                </div>
            

@endsection
