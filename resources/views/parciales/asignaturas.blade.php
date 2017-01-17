@extends('welcome')

@section('contentheader_title', 'Asignaturas')
@section('contentheader_description', 'Asignadas')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">ASIGNATURAS ASIGNADAS EN EL PERIODO LECTIVO : {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} )</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th>Curso</th>
                                <th>Sección</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaturas as $asig)
                                <tr>
                                    <td> {{ $asig->asignatura }} </td>
                                    <td> {{ $asig->curso }} </td>
                                    <td> {{ $asig->literal }}</td>
                                    <td>
                                        <a href="{{ route('parciales.estudiantes',$asig->id_seccion) }}" class="btn"><i class=" icon-refresh"></i></a>
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