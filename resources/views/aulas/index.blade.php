@extends('welcome')

@section('contentheader_title', 'Aulas')
@section('contentheader_description', 'Inicio')


@section('main-content')


    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nueva Aula" onclick="window.location.href = '{{ URL::to('aulas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Aulas</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Aula</th>
                                    <th>Creada</th>
                                    <th>Actualizada</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($aula as $aula)
                                <tr>
                                    <td>{{$aula->nombre}}</td>
                                    <td>{{$aula->created_at}}</td>
                                    <td>{{$aula->updated_at }}</td>
                                    <td align="center">
                                        <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                        <a class="btn btn-danger btn-flat" onclick="codigo({{ $aula->id }})" data-toggle="modal" data-target="#myModal"> <i class="icon-trash icon-white"></i></a>
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
                    <h4 class="modal-title">Eliminar Personal</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta aula en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['aulas.destroy', 0133], 'method' => 'DELETE']) !!}
                        {{ csrf_field() }}
                        <input type="hidden" id="codigo" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

<script type="text/javascript">

    function codigo(codigo){
        $('#codigo').val(codigo);
    }

</script>