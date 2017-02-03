@extends('welcome')

@section('contentheader_title', 'Representantes')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Representante" onclick="window.location.href = '{{ URL::to('representante/buscar') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Representantes</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Nacionalidad</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th style="width: 150px;">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($representantes as $representante)
                                <tr>
                                    <td>{{ $representante->cedula_re }}</td>
                                    <td>{{ $representante->nombres_re }}</td>
                                    <td>{{ $representante->nacionalidad_re }}</td>
                                    <td>{{ $representante->telefono_re }}</td>
                                    <td>{{ $representante->direccion_re }}</td>
                                    <td>
                                        <a href="{{ route('representantes.show', $representante->id) }}" class="btn"><i class="icon-eye-open"></i></a>
                                        <a href="{{ route('representantes.edit', $representante->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                        <a href="#" class="btn btn-danger btn-flat" onclick="representante({{ $representante->id }})" data-toggle="modal" data-target="#myModal"><i class="icon-trash icon-white"></i></a>
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
                    <h4 class="modal-title">Eliminar representante</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este representante en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['representantes.destroy', 1033], 'method' => 'DELETE']) !!}
                    <input type="hidden" id="representante" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

<script type="text/javascript">

    function representante(representante){
        $('#representante').val(representante);
    }

</script>
