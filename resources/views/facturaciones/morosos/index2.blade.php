@extends('welcome')

@section('contentheader_title', 'Facturaciones')
@section('contentheader_description', 'Por vencer')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">FACTURACIONES POR VENCER</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nombre(s)</th>
                                    <th>Teléfono</th>
                                    <th>Rubro</th>
                                    <th>Dias por vencer</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($facturacionesxVencer as $key => $facturas)
                                    <tr>
                                        <td>{{ $facturas->factura->numero }}</td>
                                        <td>{{ $facturas->factura->estudiante->representante->nombres_re }}</td>
                                        <td>{{ $facturas->factura->estudiante->representante->telefono_re }}</td>
                                        <td>{{ $facturas->rubro->nombre }}</td>
                                        @if($xvencer[$key] == 0)
                                            <td style="text-align: center;"><span class="badge badge-important">{{ $xvencer[$key] }}</td>
                                        @else
                                            <td style="text-align: center;"><span class="badge badge-warning">{{ $xvencer[$key] }}</span></td>
                                        @endif
                                        @if(!empty($facturas->realizados()->get()->last()))
                                            <td>{{ $facturas->realizados()->get()->last()->monto_adeudado }}</td>
                                        @else
                                            <td>{{ $facturas->factura->total_pago }}</td>
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

@endsection
