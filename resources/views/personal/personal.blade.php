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
                <div class="muted pull-left">Personal</div>
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
                                            <a href="{{ route('personal.edit', $per->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                            <a class="btn btn-danger btn-flat" onclick="codigo({{ $per->id }})" data-toggle="modal" data-target="#myModal"> <i class="icon-trash icon-white"></i></a>
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


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Personal</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este personal en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    <form action="personal/destroy" method="get">
                        <input type="hidden" id="codigo" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function codigo(codigo){
            $('#codigo').val(codigo);
        }

    </script>
    
@endsection
