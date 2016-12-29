@extends('layouts.app')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Inicio')


@section('main-content')                    
<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 10px;">
            @include('alerts.request')
            @include('alerts.errors') 
        </div>  
    </div> 
    <div class="col-md-1">
        <div class="row" style="padding-top: 5px">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel."><a href="{{ url('descargarPagos') }}"> <span class="text-light-blue">Excel</span></a>
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Prestamos y Anticipos</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Capital</th>
                                    <th>Tipo</th>
                                    <th>Monto Prestamo</th>
                                    <th>Monto Deudor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($prestamo as $per)
                                   <?php 
                                    $i = 0; $monto = 0;
                                    foreach ($per->pagosrealizados as $key) {
                                        $i += $key->monto_pagado;
                                        $monto = $key->monto_adeudado;
                                    }

                                    ?>
                                    <tr>
                                        <td>{{$per->fecha }}</td>
                                        <td>{{$per->personal->nombres}}</td>
                                        <td>{{$per->personal->apellido_paterno}} {{ $per->personal->apellido_materno }}</td>
                                        <td>{{ $per->personal->remuneracion->sueldo_mens+$per->personal->remuneracion->bono_responsabilidad }}</td>
                                        <td>{{$per->tipo}}</td>
                                        <td>{{$per->monto }}</td>
                                @if($per->tipo == 'Prestamo')
                                    @if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                                        <td>0</td>
                                        <td></td>
                                        @else
                                            <td>{{ $per->monto-$i }}</td>
                                            <td class="text-center"> {!!link_to_route('pagos.update', $title = '', $parameters = $per->id, $attributes = ['class'=>'fa fa-money fa-2x'])!!}</td>
                                    @endif    
                                @endif                                     
                                    </tr>  
                                    @endforeach
                            </tbody>
                         </table>
                           
                    </div>            
                </div>
          
@endsection
