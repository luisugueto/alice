@extends('layouts.app')

@section('contentheader_title', 'Usuarios')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('usuarios/create') }}'";>
                    <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                </button>
            </div>

            <div class="col-xs-12" style="padding-top: 20px;">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuarios</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Nombre(s)</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $usuario)
                                        <tr>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->roles->nombre }}</td>
                                            <td class="text-center">{!!link_to_route('usuarios.edit', $title = '', $parameters = $usuario->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>
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

@endsection
