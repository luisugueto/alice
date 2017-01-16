@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inscritos')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Área" onclick="window.location.href = '{{ URL::to('areas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }}( {{ $periodo->status}} )</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Cédula</th>
                                <th>Apellido(s)</th>
                                <th>Nombre(s)</th>
                                <th>Género</th>
                                <th>Curso</th>
                                <th>Sección</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td> {{ $estudiante->codigo_matricula }} </td>
                                    <td> {{ $estudiante->cedula }} </td>
                                    <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                    <td> {{ $estudiante->nombres }}</td>
                                    <td> {{ $estudiante->genero }}</td>
                                    <td> {{ $estudiante->curso }} </td>
                                    <td> {{ $estudiante->literal }} </td>
                                    <td>
                                        {!! link_to_route('inscripciones.cambiarseccion.buscar', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-exchange fa-2x','title' => 'Seleccione para Cambiar de Seccion']) !!}
                                        {!! link_to_route('certificados.matricula', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-print fa-2x','title' => 'Imprimir Certificado de Matrícula']) !!}
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