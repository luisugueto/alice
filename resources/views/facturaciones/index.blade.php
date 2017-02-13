@extends('welcome')

@section('contentheader_title', 'Facturaciones')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar facturación" onclick="window.location.href = '{{ URL::to('facturaciones/buscar/estudiante') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Facturaciones</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Vence</th>
                                <th>Cédula</th>
                                <th>Nombre(s)</th>
                                <th>Monto</th>
                                <th>Monto Deudor</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($facturacion as $key => $facturaciones)
                                <tr>
                                    @if(count($facturaciones->realizados) > 0)
                                        <?php $i = 0; $monto = 0; ?>
                                        @foreach($facturaciones->realizados as $pagos)

                                            <?php

                                            $i += $pagos->monto_pagado;
                                            $monto = $pagos->monto_adeudado;
                                            ?>

                                        @endforeach
                                    @else
                                        <?php $monto = $facturaciones->factura->total_pago; ?>
                                    @endif
                                    <td>{{$facturaciones->rubro->fecha}}</td>
                                    <td>{{$facturaciones->factura->estudiante->cedula}}</td>
                                    <td>{{$facturaciones->factura->estudiante->nombres}}</td>
                                    <td>{{$facturaciones->factura->total_pago}}</td>
                                    <td>{{$monto}}</td>
                                    <td style="text-align: center; width: 150px;">
                                        @if($monto != '0')
                                            <a href="{{ route('facturaciones.edit', $facturaciones->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
                                        @endif
                                        @if(count($facturaciones->realizados) > 0)
                                            <a href="{{ route('facturaciones.pdf', $facturaciones->id_factura) }}" class="btn btn-inverse"><i class="icon-print icon-white"></i></a>
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
