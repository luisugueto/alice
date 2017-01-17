@extends('welcome')

@section('contentheader_title', 'Asignaturas')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Asignatura" onclick="window.location.href = '{{ URL::to('asignaturas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Asignaturas</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                    <td class="text-center">{!!link_to_route('asignaturas.edit', $title = '',$parameters = $asignatura->id, $attributes = ['class'=>'btn btn-primary btn-flat'])!!}</td>
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