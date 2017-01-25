@extends('welcome')

@section('contentheader_title', 'Periodos')
@section('contentheader_description', 'Activar')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Periodo Lectivo Activo: {{$periodo->nombre}}</div>
        </div>
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Nuevo Periodo Lectivo para Activar: {{$periodo->nombre+1}}</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                    <fieldset>
                        <legend>Activar Periodo Lectivo {{$periodo->nombre+1}}</legend>
                        <div class="control-group">
                            <div class="controls">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Activar <i class="fa fa-check"></i></a>
                                </div>
                        </div>

                    </fieldset>
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
