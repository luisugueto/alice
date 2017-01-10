@extends('layouts.app')

@section('contentheader_title', 'Asistencias')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/create') }}'";>
                    <span class="fa fa-check" aria-hidden="true"></span> Procesar Entrada
                </button>
                <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/salida') }}'";>
                    <span class="fa fa-close" aria-hidden="true"></span> Procesar Salida
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asistencias</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Personal</th>
                                        <th>Cargo</th>
                                        <th>Entrada</th>
                                        <th>Salida</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($asistencias)>0)
                                        @foreach($asistencias as $key => $asistencia)
                                            <tr>
                                                <td>{{ $asistencia->nombres }} {{ $asistencia->apellido_paterno }}</td>
                                                <td>{{ $asistencia->cargo->nombre }}</td>
                                                <td>{{ $fecha[$key]->entrada }}</td>
                                                <td>{{ $fecha[$key]->salida }}</td>
                                            <!-- <td class="text-center">{!!link_to_route('asistencias.edit', $title = '', $parameters = $asistencia->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td> -->
                                            </tr>
                                        @endforeach
                                    @endif
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