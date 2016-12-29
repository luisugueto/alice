@extends('layouts.app')

@section('htmlheader_title')
    Control de Pagos
@endsection

@section('contentheader_title', 'Control de Pagos')


@section('main-content')
    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-1">
                <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel.">
                    <a href="{{ url('descargarControl') }}"> <span class="text-muted">Excel</span></a>
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuarios</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <td>Nombre y Apellido</td>
                                        <td>Cedula</td>
                                        <td>Cargo</td>
                                        <td>Area de Trabajo</td>
                                        <td>Capital</td>
                                        <td>Prestamos y Anticipos</td>
                                        <td>Minutos de Retardo Asistencia</td>
                                        <td>Pago Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($personal as $per)
                                        <tr>
                                            <td>{{$per->nombres}} {{$per->apellido_paterno}}</td>
                                            <td>{{$per->cedula}}</td>
                                            <td>{{$per->cargo->nombre}}</td>
                                            <td>{{$per->cargo->area->nombre}}</td>
                                            <td>{{ remuneracion($per->id) }}</td>
                                            <td>{{ totalPrestamos($per->id) }}</td>
                                            <td>{{ retardoAsistencia($per->id) }}</td>
                                            <td>{{ remuneracion($per->id)-totalPrestamos($per->id) }}</td>
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