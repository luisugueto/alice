@extends('layouts.app')

@section('contentheader_title', 'Área')
@section('contentheader_description', 'Editar')

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
                        <h3 class="box-title">Área</h3>
                    </div>

                    {!!Form::model($area, ['route' => ['areas.update', $area->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box-body">

                        @include('areas.forms.fields')

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
