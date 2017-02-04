@extends('welcome')

@section('contentheader_title', 'Descuentos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        @if($cantidad==0)
        <button class="btn btn-primary" title="Registrar Nuevo Cargo" onclick="window.location.href = '{{ URL::to('descuentos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
        @endif
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Descuentos por minuto de Retraso</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Tipo de Empleado</th>
                                <th>Cantidad por minuto de Retraso</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($descuentos as $desc)
                                <tr>
                                    <td>{{ $desc->tipoempleado->tipo_empleado}}</td>
                                    <td>{{ $desc->cantidad}}</td>
                                    <td style="text-align: center; width: 150px;">
                                       <a href="{{ route('descuentos.edit',[$desc->id]) }}" class="btn btn-primary" title="Ver calificaciones del parcial cargadas"><i class="icon-refresh icon-white"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection