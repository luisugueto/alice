@extends('layouts.app')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Editar')

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

                {!!Form::model($cargo, ['route'=>['cargos.update', $cargo->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Cargo {{ $cargo->nombre }}</h3> 
                        </div>
                        <div class="box-body">
                            
                            @include('cargos.forms.fields')

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </section>
</div>

@endsection