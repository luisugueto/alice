@extends('layouts.app')

@section('contentheader_title', 'Facturaciones')
@section('contentheader_description', 'Inicio')


@section('main-content')                    
<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 10px;">
            @include('alerts.request')
            @include('alerts.errors') 
        </div>  
    </div> 
    <div class="col-md-12">
        <div class="row" style="padding-top: 5px">
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('rubros/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Facturaciones</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
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
                                @foreach($rubros as $key => $estudiante)
                                    <tr>
                                        <?php $i = 0; $monto = 0; ?>

                                        @foreach($rubros_e[$key]->rubros_realizados as $pagos)
                                            <?php
                                                //echo $pagos; 
                                                $i += $pagos->monto_pagado;
                                                $monto = $pagos->monto_adeudado; 
                                             ?>

                                        @endforeach

                                        <td>{{$rubros_e[$key]->fecha}}</td>
                                        <td>{{$representante[$key]->cedula_re}}</td>
                                        <td>{{$representante[$key]->nombres_re}}</td>
                                        <td>{{$rubros_e[$key]->monto}}</td>
                                        <td>{{ $monto }}</td>
                                        <td class="text-center">{!! link_to_route('facturaciones.edit', $title = '', $parameters = $facturacion[$key], $attributes = ['class'=>'fa fa-money fa-2x']) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                    </div>            
                </div>
            </div>
        </div>
    </section>
@endsection