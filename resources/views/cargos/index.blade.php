@extends('layouts.app')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Nuevo Cargo" onclick="window.location.href = '{{ URL::to('cargos/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cargos</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Nombre(s)</th>
                                        <th>Área</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cargo as $cargo)
                                        <tr>
                                            <td>{{ $cargo->nombre}}</td>
                                            <td>{{ $cargo->area->nombre}}</td>
                                            <td class="text-center">
                                                @if($cargo->nombre!="DOCENTE DE PLANTA" AND $cargo->nombre!="DOCENTE ROTATIVO")
                                                    {!!link_to_route('cargos.edit', $title = '', $parameters = $cargo->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}
                                                @endif
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