@extends('layouts.app')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Clientes')


@section('main-content')                    
<div class="col-md-12"><br><br>
    
    @include('alerts.request')
    @include('alerts.errors')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Vence</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Monto</th>
                                    <th>Monto Deudor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($rubros as $rubros)
                                    <tr>
                                        <?php $i = 0; $monto = 0; ?>

                                        @foreach($rubros->rubros_realizados as $pagos)

                                            <?php $i += $pagos->monto_pagado ?>
                                            <?php $monto = $pagos->monto_adeudado ?>

                                        @endforeach

                                        <td>{{ $rubros->fecha_max }}</td>
                                        <td>{{ $rubros->estudiante->nombres }}</td>
                                        <td>{{ $rubros->estudiante->apellidos }}</td>
                                        <td>{{ $rubros->monto }}</td>
                                        <td>
                                            {{ $monto }}
                                        </td>
                                        <td></td>                                    
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@endsection