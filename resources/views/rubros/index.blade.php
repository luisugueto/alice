@extends('welcome')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Rubro" onclick="window.location.href = '{{ URL::to('rubros/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Rubros</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                    <td class="text-center">{!! link_to_route('rubros.edit', $title = '', $parameters = $rubros->id, $attributes = ['class'=>'btn btn-primary btn-flat']) !!}</td>
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
