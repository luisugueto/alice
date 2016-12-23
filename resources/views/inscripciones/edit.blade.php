@extends('layouts.app')

@section('contentheader_title', 'Cambio de Sección')
@section('contentheader_description', '')

@section('main-content') 

<div class="col-md-12"><br><br>  
    <section class="content">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
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
            </div>
        </div>
    </section>
</div>

@endsection
