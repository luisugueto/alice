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
                                    <td style="text-align: center; width: 150px;">
                                        <a href="{{ route('secciones.edit', $i->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                        <a class="btn btn-danger btn-flat" onclick="codigo({{ $i->id }})" data-toggle="modal" data-target="#myModal"> <i class="icon-trash icon-white"></i></a>
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
                    <h4 class="modal-title">ELIMINAR SECCIÓN</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta sección en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['secciones.destroy', 0133], 'method' => 'DELETE']) !!}
                    {{ csrf_field() }}
                    <input type="hidden" id="seccion" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function codigo(seccion){
            $('#seccion').val(seccion);
        }

    </script>

@endsection


