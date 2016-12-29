@extends('layouts.app')

@section('contentheader_title', 'Cargo')
@section('contentheader_description', 'Nuevo')

@section('main-content')
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                 {!! Form::open(['route' => 'cargos.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Cargo</h3>
                        </div>
                        <div class="box-body">
                            
                            @include('cargos.forms.fields')

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}


@endsection