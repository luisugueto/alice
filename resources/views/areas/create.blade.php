@extends('layouts.app')

@section('contentheader_title', 'Área')
@section('contentheader_description', 'Nuevo')

@section('main-content')

<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 20px;">
            @include('alerts.request')
            @include('alerts.errors')
        </div>
    </div>

    <section class="content"> 
        <div class="row">
            <div class="col-md-12"> 

                 {!! Form::open(['route' => 'areas.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Área</h3>
                        </div>
                        <div class="box-body">
                            
                            @include('areas.forms.fields')

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </section>
</div>

@endsection
