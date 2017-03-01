@extends('welcome')

@section('contentheader_title', 'Facturaciones')
@section('contentheader_description', 'Anuladas')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">LISTADO DE FACTURAS ANULADAS</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Factura número</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Descripción</th>
                                    <th>Nombre(s)</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($facturaciones as $anuladas)
                                    <tr>
                                        <td>{{ $anuladas->anulacion->numero }}</td>
                                        <td>{{ $anuladas->anulacion->fecha }}</td>
                                        <td>{{ $anuladas->anulacion->total_pago }}</td>
                                        <td>{{ $anuladas->descripcion }}</td>
                                        <td>{{ $anuladas->anulacion->estudiante->representante->nombres_re }}</td>
                                        <td>{{ $anuladas->anulacion->estudiante->representante->telefono_re }}</td>
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
