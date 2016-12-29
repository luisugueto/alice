@extends('layouts.app')

@section('contentheader_title', 'Asignaturas')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Nueva Asignatura" onclick="window.location.href = '{{ URL::to('asignaturas/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asignaturas</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Asignatura</th>
                                        <th>Código</th>
                                        <th>Curso</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($asignaturas as $asignatura)
                                        <tr>
                                            <td>{{ $asignatura->asignatura }}</td>
                                            <td>{{ $asignatura->codigo }}</td>
                                            <td>{{ $asignatura->cursos->curso }}</td>
                                            <td class="text-center">{!!link_to_route('asignaturas.edit', $title = '',$parameters = $asignatura->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>
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