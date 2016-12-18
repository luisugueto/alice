@extends('layouts.app')

@section('htmlheader_title')
    Prestamos y Anticipos
@endsection

@section('contentheader_title', 'Prestamos y Anticipos')


@section('main-content')                    
<div class="col-md-12">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @include('alerts.errors')
    
    <section class="content">
        <div class="row">
            <div class="col-md-14">

                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> 
                            <div class="form-group"> 
                               <b>Listado</b>
                            </div>
                             </h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <td>Fecha</td>
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Tipo</td>
                                        <td>Monto Prestamo</td>
                                        <td>Monto Deudor</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                            
                                   @foreach($prestamo as $per)
                                   <?php $i = 0; $monto = 0;
                                            foreach ($per->pagosrealizados as $key) {
                                                $i += $key->monto_pagado;
                                                $monto = $key->monto_adeudado;
                                            }

                                        ?>
                                    <tr>
                                        <td>{{$per->fecha }}</td>
                                        <td>{{$per->personal->nombres}}</td>
                                        <td>{{$per->personal->apellido_paterno}} {{ $per->personal->apellido_materno }}</td>
                                        <td>{{$per->tipo}}</td>
                                        <td>{{$per->monto }}</td>
                                        <td>{{ $per->monto-$i }}</td>
                                @if($per->tipo == 'Prestamo')
                                    @if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                                        <td></td>
                                        @else
                                            <td> {!!link_to_route('pagos.update', $title = 'Realizar Pago de Prestamo', $parameters = $per->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
                                    @endif    
                                @endif                                     
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>
                          
                           
                        </div>
                        
                    </div>
@stop