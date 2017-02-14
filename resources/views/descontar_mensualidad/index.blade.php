@extends('welcome')

@section('contentheader_title', 'Descuento en Mensualidad')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Descuento en Mensualidad</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Monto</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($descuentos as $desc)
                                <tr>
                                    <td>{{ $desc->nombre }}</td>
                                    <td>{{ $desc->cantidad }}</td>
                                    <td style="text-align: center; width: 150px;">
                                       <a href="{{ route('descontar_mensualidad.edit',[$desc->id]) }}" class="btn btn-primary" title="Ver calificaciones del parcial cargadas"><i class="icon-refresh icon-white"></i></a>
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