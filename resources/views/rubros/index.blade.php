@extends('layouts.app')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Nuevo Rubro" onclick="window.location.href = '{{ URL::to('rubros/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Rubros</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Curso</th>
                                        <th>Periodo</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rubros as $rubros)
                                        <tr>
                                            <td>{{$rubros->nombre}}</td>
                                            <td>{{$rubros->monto}}</td>
                                            <td>{{$rubros->fecha }}</td>
                                            <td>{{$rubros->curso->curso}}</td>
                                            <td>{{$rubros->periodo->nombre}}</td>
                                            <td class="text-center">{!! link_to_route('rubros.edit', $title = '', $parameters = $rubros->id, $attributes = ['class'=>'fa fa-edit fa-2x']) !!}</td>
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
