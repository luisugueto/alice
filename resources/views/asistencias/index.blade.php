@extends('welcome')

@section('contentheader_title', 'Asistencias')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/create') }}'";>
            <span class="fa fa-check" aria-hidden="true"></span> Procesar Entrada
        </button>
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/salida') }}'";>
            <span class="fa fa-close" aria-hidden="true"></span> Procesar Salida
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Asistencias</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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

@endsection