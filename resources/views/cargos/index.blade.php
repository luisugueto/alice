@extends('welcome')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Cargo" onclick="window.location.href = '{{ URL::to('cargos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cargos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nombre(s)</th>
                                <th>Área</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cargo as $cargo)
                                <tr>
                                    <td>{{ $cargo->nombre}}</td>
                                    <td>{{ $cargo->area->nombre}}</td>
                                    <td class="text-center">
                                        @if($cargo->nombre!="DOCENTE DE PLANTA" AND $cargo->nombre!="DOCENTE ROTATIVO")
                                            {!!link_to_route('cargos.edit', $title = '', $parameters = $cargo->id, $attributes = ['class'=>'btn btn-primary btn-flat'])!!}
                                        @endif
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