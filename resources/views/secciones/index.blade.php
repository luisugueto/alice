@extends('layouts.app')

@section('contentheader_title', 'Secciones')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Nueva Sección" onclick="window.location.href = '{{ URL::to('secciones/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Secciones</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Literal</th>
                                        <th>Capacidad</th>
                                        <th>Curso</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($seccion as $i)
                                        <tr>
                                            <td>{{ $i->literal}}</td>
                                            <td>{{ $i->capacidad }} </td>
                                            <td>{{ $i->curso->curso }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('secciones.edit', $i->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
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


