@extends('layouts.app')

@section('contentheader_title', 'Empleados')
@section('contentheader_description', 'Inicio')

@section('main-content')
    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Nuevo Tipo de Empleado" onclick="window.location.href = '{{ URL::to('tipo_empleado/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Empleados</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tipo_empleado as $tipo_empleado)
                                        <tr>
                                            <td>{{ $tipo_empleado->tipo_empleado}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('tipo_empleado.edit', [$tipo_empleado->id]) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                                                <a href="{{ route('tipo_empleado.destroy', [$tipo_empleado->id]) }}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>

@endsection