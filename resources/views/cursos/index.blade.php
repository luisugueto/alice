@extends('welcome')

@section('contentheader_title', 'Cursos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Cargo" onclick="window.location.href = '{{ URL::to('cursos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cursos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cursos as $cur)
                                <tr>
                                    <td>{{ $cur->curso }}</td>
                                    <td style="text-align: center; width: 150px;">
                                       <a href="{{ route('cursos.edit',[$cur->id]) }}" class="btn btn-primary" title="Ver calificaciones del parcial cargadas"><i class="icon-refresh icon-white"></i></a>
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