@extends('welcome')

@section('contentheader_title', 'Personal')
@section('contentheader_description', 'Inicio')


@section('main-content')

    @if(verificarPeriodo()=='activo')
        <div class="col-xs-12">
            <button class="btn btn-primary" title="Registrar personal" onclick="window.location.href = '{{ URL::to('/nuevo_personal') }}'";>
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nuevo
            </button>
        </div>
    @endif

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
                                <th>Nombre(s)</th>
                                <th>Apellidos</th>
                                <th>Cédula</th>
                                <th>Cargo</th>
                                <th>Área de Trabajo</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($personal as $per)
                                <tr>
                                    <td>{{$per->nombres}}</td>
                                    <td>{{$per->apellido_paterno}} {{ $per->apellido_materno }}</td>
                                    <td>{{$per->cedula}}</td>
                                    <td>{{$per->cargo->nombre}}</td>
                                    <td>{{$per->cargo->area->nombre}}</td>
                                    @if(verificarPeriodo()=='activo')
                                        <td>
                                        <!-- <a href="{{ route('personal.show', $per->id) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a> -->
                                            <a href="{{ route('personal.edit', $per->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                                            <a href="personal/{{ $per->id }}/destroy" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
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