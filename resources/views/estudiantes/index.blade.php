@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inicio')


@section('main-content')

    @if(verificarPeriodo()=='activo')
        <div class="col-xs-12">
            <button class="btn btn-primary" title="Registrar Estudiante" onclick="window.location.href = '{{ URL::to('representante/buscar') }}'";>
                <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
            </button>
        </div>
    @endif

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Cédula</th>
                                    <th>Apellido(s)</th>
                                    <th>Nombre(s)</th>
                                    <th>Género</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td> {{ $estudiante->codigo_matricula }} </td>
                                    <td> {{ $estudiante->cedula }} </td>
                                    <td> {{ $estudiante->apellidos }}</td>
                                    <td> {{ $estudiante->nombres }}</td>
                                    <td> {{ $estudiante->genero }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-default btn-flat"><i class="icon-eye-open"></i></a>
                                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
                                        <a href="{{ route('estudiantes.destroy', $estudiante->id) }}" class="btn btn-danger btn-flat" onclick="estudiante({{ $estudiante->id }})" data-toggle="modal" data-target="#myModal"><i class="icon-trash icon-white"></i></a>
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
                    <h4 class="modal-title">Eliminar estudiante</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este estudiante en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['estudiantes.destroy', 1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="estudiante" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

<script type="text/javascript">

    function estudiante(estudiante){
        $('#estudiante').val(estudiante);
    }

</script>