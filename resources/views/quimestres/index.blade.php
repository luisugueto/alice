@extends('welcome')

@section('contentheader_title', 'Quimestres')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Quimestres</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Fech de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Número</th>
                                <th>Periodo</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quimestres as $quimestres)
                                <tr>
                                    <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->inicio}}</a></td>
                                    <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->fin}}</a></td>
                                    <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->numero}}</a></td>
                                    <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->periodos->nombre}}({{$quimestres->periodos->status}})</a></td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('quimestres.edit', [$quimestres->id]) }}" class="btn btn-primary"> <i class="icon-refresh icon-white"></i></a>
                                        <a href="{{ route('quimestres.destroy', [$quimestres->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro"> <i class="icon-trash icon-white"></i></a>
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

