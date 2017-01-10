@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inicio')


@section('main-content')
    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>
        @if(verificarPeriodo()=='activo')

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Estudiante" onclick="window.location.href = '{{ URL::to('representante/buscar') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>
        @endif

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuarios</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Cédula</th>
                                        <th>Apellido(s)</th>
                                        <th>Nombre(s)</th>
                                        <th>Género</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($estudiantes as $estudiante)
                                        <tr>
                                            <td> {{ $estudiante->codigo_matricula }} </td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{ $estudiante->apellidos }}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                            <td> {{ $estudiante->genero }}</td>
                                            <td class="text-center">
                                                <!--<a href="-- route('estudiantes.show', $estudiante->id) --}}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>-->
                                                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                                                <!--<a href="-- route('estudiantes.destroy', $estudiante->id) --}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>-->
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
