@extends('layouts.app')

@section('contentheader_title', 'Morosos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-1">
                <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel.">
                    <a href="{{ url('descargarMorosos') }}"> <span class="text-muted">Excel</span></a>
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
                                        <th>Cédula</th>
                                        <th>Cliente</th>
                                        <th>Teléfono</th>
                                        <th>Estudiante</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($morosos as $key => $morosos)
                                        <tr>
                                            <td>{{$morosos->cedula_re}}</td>
                                            <td>{{$morosos->nombres_re}}</td>
                                            <td>{{$morosos->telefono_re}}</td>
                                            <td>{{$morosos->nombres}}</td>
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