@extends('layouts.app')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Periodo')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('horarios/buscar') }}'";>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Horarios</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Sección</th>
                                        <th>Periodo</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($horarios as $horario)
                                        <tr>
                                            <td>{{$horario->curso}}</td>
                                            <td>{{$horario->literal}}</td>
                                            <td>{{$horario->nombre}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('horarios.show', $horario->id_seccion) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('horarios.edit', $horario->id_seccion) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
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