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
                                        <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
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