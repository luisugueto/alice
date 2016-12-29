@extends('layouts.app')
@section('contentheader_title', 'Asignaturas Asignadas')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asignaturas Asignadas en el periodo lectivo : {{ $periodo->nombre }} ( {{$periodo->status}} )</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
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
                                                {!! link_to_route('parciales.estudiantes', $title = '', $parameters = $asig->id_seccion, $attributes = ['class'=>'fa fa-th-list fa-2x','title' => 'Listar Estudiantes']) !!}
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