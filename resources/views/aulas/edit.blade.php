@extends('layouts.app')

@section('contentheader_title', 'Aula')
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

                {!! Form::model($aula, ['route'=> ['aulas.update', $aula->id], 'method'=>'PUT', 'files' => true]) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Aula {{ $aula->nombre }}</h3> 
                        </div>
                        <div class="box-body">
                            
                            @include('aulas.forms.fields') 

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

@endsection
