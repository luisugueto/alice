@extends('welcome')

@section('contentheader_title', 'Respaldos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Usuario" onclick="window.location.href = '{{ URL::to('respaldos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Respaldos</div>
            </div>
            <div class="loader"></div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tamaño</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($backups as $backup)
                                <tr>
                                    <td>{{ $backup['file_name'] }}</td>
                                    <td>{{ $backup['file_size'] }} KB</td>
                                    <td>{{ $backup['last_modified'] }}</td>
                                    <td style="text-align: center;">
                                        <input type="hidden" name="archivo" value="{{ $backup['file_name'] }}">
                                        <a class="btn btn-default" href="{{ route('respaldos.download', $backup['file_name']) }}"><i class="icon-download-alt"></i></a>
                                        <a class="btn btn-default" href="{{ route('respaldos.restore', $backup['file_name']) }}" id="cargando" onclick="cargando()"><i class="icon-upload"></i></a>
                                        <a class="btn btn-danger" href="#" onclick="codigo('{{ $backup['file_name'] }}')" data-toggle="modal" data-target="#myModal"><i class="icon-trash icon-white"></i></a>
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
                    <h4 class="modal-title">ELIMINAR RESPALDO</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este respaldo en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['respaldos.destroy', 0133], 'method' => 'DELETE']) !!}
                    {{ csrf_field() }}
                    <input type="hidden" id="file_name" name="file_name">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <img src="{{ asset('img/buffer-loading.gif') }}">
    </div>

    <script type="text/javascript">

        function codigo(file_name){
            $('#file_name').val(file_name);
        }

    </script>
    <script type="text/javascript">
        function cargando(){
            $(".navbar-inner").css('display', 'none');
              $.blockUI({ message: '<h1 style="margin-top: 30px"><img src="{{ asset("img/buffer-loading.gif") }}" /> RESTAURANDO...</h1>' }); 
            test(); 
        }
    
    </script>
@endsection
