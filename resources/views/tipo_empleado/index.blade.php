@extends('welcome')

@section('contentheader_title', 'Empleados')
@section('contentheader_description', 'Inicio')

@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Tipo de Empleado" onclick="window.location.href = '{{ URL::to('tipo_empleado/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Tipo de Empleados</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                    <!-- <a href="{{-- route('tipo_empleado.destroy', [$tipo_empleado->id]) --}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>-->
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