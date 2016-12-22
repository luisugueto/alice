@extends('layouts.app')

@section('htmlheader_title')
    Prestamos y Anticipos
@endsection

@section('contentheader_title', 'Prestamos y Anticipos')


@section('main-content')                    
<div class="col-md-12">
    @include('alerts.errors')
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> 
                            <div class="form-group"> 
                               <b>Listado</b>
                               <br><b>Total de Prestamos: {{ $capital }}</b>
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
                                        <td>Capital</td>
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
                                        <td>{{ $per->personal->remuneracion->sueldo_mens+$per->personal->remuneracion->bono_responsabilidad }}</td>
                                        <td>{{$per->tipo}}</td>
                                        <td>{{$per->monto }}</td>
                                @if($per->tipo == 'Prestamo')
                                    @if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                                        <td>0</td>
                                        <td></td>
                                        @else
                                            <td>0</td>
                                            <td> {!!link_to_route('pagos.update', $title = '', $parameters = $per->id, $attributes = ['class'=>'fa fa-money fa-2x'])!!}</td>
                                    @endif    
                                @endif                                     
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>
                        
                           
                        </div>
                        
                    </div>
                </div>
            </section>
        {!!link_to_route('pagos.mensual', $title = ' Exportar a Excel', $parameters = 'persona='.$per->id, $attributes = ['class'=>'btn btn-primary fa fa-file-excel-o'])!!}
        </div>
            
@stop