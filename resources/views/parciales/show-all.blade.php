@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inscritos')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }} ( {{$periodo->status}} )</div>
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
                                <th colspan="2">Estado</th>
                                <th>Pendiente por Cargar:</th>
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
                                    @if(count($estudiante->cursos)>0)
                                        <td colspan="2"> Inscrito </td>
                                    @else
                                        <td colspan="2">Sin Inscribir</td>
                                    @endif
                                    <td>{{ buscar_dr($estudiante->id)  }}</td>
                                    <td>
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