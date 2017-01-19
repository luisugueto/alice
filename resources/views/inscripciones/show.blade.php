@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inscritos')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">ESTUDIANTES INSCRITOS EN EL PERIODO LECTIVO : {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} )</div>
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
                                        <a href="{{ route('certificados.matricula', $estudiante->id_estudiante) }}" class="btn btn-inverse"><i class="icon-print icon-white"></i></a>
                                        <a href="{{ route('inscripciones.cambiarseccion.buscar', $estudiante->id_estudiante) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
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