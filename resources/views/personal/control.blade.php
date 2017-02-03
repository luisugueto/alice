@extends('welcome')

@section('contentheader_title', 'Control de Pagos')
@section('contentheader_description', 'Inicio')

@section('main-content')

    <div class="col-xs-12">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel.">
            <a href="{{ url('descargarControl') }}"> <span class="text-muted">Excel</span></a>
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Control de Pagos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nombre y Apellido</th>
                                <th>Cedula</th>
                                <th>Cargo</th>
                                <th>Area de Trabajo</th>
                                <th>Capital</th>
                                <th>Prestamos y Anticipos</th>
                                <th>Minutos de Retardo Asistencia</th>
                                <th>Descuento por Retardo</th>
                                <th>Pago Total</th>
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
                                    <td>{{ retardoAsistencia($per->id) * descuentosPersonal($per->cargo->empleado->id) }}</td>
                                    <td>{{ (remuneracion($per->id)-totalPrestamos($per->id)-retardoAsistencia($per->id) * descuentosPersonal($per->cargo->empleado->id)) }}</td>
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