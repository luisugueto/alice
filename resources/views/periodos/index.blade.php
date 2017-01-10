@extends('layouts.app')

@section('contentheader_title', 'Periodos')
@section('contentheader_description', 'Activar')

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
                        <h3 class="box-title">Nuevo Periodo</h3>
                    </div>

                    <div class="box-body">
                        <div class="col-md-4">
                            {!! Form::label('Activar', 'Activar Periodo') !!} <small class="text-red">*</small>

                            <div class="form-group form-inline">
                                <div class="input-group">
                                    <div class="form-group{{ $errors->has('activar') ? ' has-error' : '' }}">
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fa fa-check"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
     <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Activar nuevo Periodo</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Seguro desea activar un nuevo periodo? Recuerde que no podrá realizar más registros en el periodo actual</strong>

                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => 'periodos.store', 'method' => 'post']) !!}
                        <input type="hidden" name="periodo" value="{{ Session::get('periodo') }}">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection
