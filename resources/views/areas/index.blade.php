@extends('welcome')

@section('contentheader_title', 'Areas')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Área" onclick="window.location.href = '{{ URL::to('areas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Areas</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Área</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($area as $area)
                                <tr>
                                    <td>{{ $area->nombre}}</td>
                                    <td>{{ $area->created_at }}</td>
                                    <td>{{ $area->updated_at }}</td>
                                    <td class="text-center">{!!link_to_route('areas.edit', $title = '',$parameters = $area->id, $attributes = ['class'=>'btn btn-primary btn-flat'])!!}</td>
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