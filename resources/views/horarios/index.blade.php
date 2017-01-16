@extends('welcome')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Periodo')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('horarios/buscar') }}'";>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Horarios</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
            
@endsection