@extends('welcome')

@section('contentheader_title', 'Morosos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-1">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel.">
            <a href="{{ url('descargarMorosos') }}"> <span class="text-muted">Excel</span></a>
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Morosos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Cliente</th>
                                <th>Teléfono</th>
                                <th>Estudiante</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($morosos as $key => $morosos)
                                <tr>
                                    <td>{{$morosos->cedula_re}}</td>
                                    <td>{{$morosos->nombres_re}}</td>
                                    <td>{{$morosos->telefono_re}}</td>
                                    <td>{{$morosos->nombres}}</td>
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