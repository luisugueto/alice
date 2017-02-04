@extends('welcome')

@section('contentheader_title', 'Asignaturas')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Asignatura" onclick="window.location.href = '{{ URL::to('asignaturas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Asignaturas</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th>Código</th>
                                <th>Curso</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura->asignatura }}</td>
                                    <td>{{ $asignatura->codigo }}</td>
                                    <td>{{ $asignatura->cursos->curso }}</td>
                                    <td style="text-align: center; width: 150px;">
                                        <a href="{{ route('asignaturas.edit', $asignatura->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                        <a class="btn btn-danger btn-flat" onclick="codigo({{ $asignatura->id }})" data-toggle="modal" data-target="#myModal"> <i class="icon-trash icon-white"></i></a>
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

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ELIMINAR ASIGNATURA</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta asignatura en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['asignaturas.destroy', 0133], 'method' => 'DELETE']) !!}
                    {{ csrf_field() }}
                    <input type="hidden" id="asignatura" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function codigo(asignatura){
            $('#asignatura').val(asignatura);
        }

    </script>

@endsection