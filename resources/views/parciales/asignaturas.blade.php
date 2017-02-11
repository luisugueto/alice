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
                                    @if(Auth::user()->roles_id == 5 && buscar_asignatura_asignada($asig->id_asignatura)>0)
                                        @if($i==1)
                                            <td><a href="{{ route('parciales.parcial_admin',[$id_estudiante,$asig->id_asignatura]) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a></td>
                                        @else
                                            <td><a href="{{ route('parciales.estudiantes2',[$asig->id_seccion]) }}" class="btn"><i class="icon-eye-open"></i></a> </td>
                                        @endif
                                    @else
                                        @if(Auth::user()->roles_id == 3)
                                            <td style="text-align: center; width: 100px;">
                                                <a href="{{ route('parciales.estudiantes',$asig->id_seccion) }}" class="btn"><i class="icon-arrow-up"></i></a>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif

                                    @endif
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