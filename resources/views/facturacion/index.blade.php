@extends('layouts.app')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Inicio')


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
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Monto</th>
                                    <th>Monto Deudor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($facturacion as $facturacion)
                                    <tr>
                                        
                                        <td></td>                                    
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection