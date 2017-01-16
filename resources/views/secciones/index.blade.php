@extends('welcome')

@section('contentheader_title', 'Secciones')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Sección" onclick="window.location.href = '{{ URL::to('secciones/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Secciones</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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

@endsection


