@extends('welcome')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel.">
            <a href="{{ url('descargarPagos') }}"> <span class="text-light-blue">Excel</span></a>
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Prestamos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                    <td>{{ remuneracion($per->personal->id) }}</td>
                                    <td>{{$per->tipo}}</td>
                                    <td>{{$per->monto }}</td>
                                    @if($per->tipo == 'Prestamo')
                                        @if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                                            <td>0</td>
                                            <td></td>
                                        @else
                                            <td></td>
                                            <td> {!!link_to_route('pagos.update', $title = '', $parameters = $per->id, $attributes = ['class'=>'fa fa-money fa-2x'])!!}</td>
                                        @endif
                                    @else
                                        <td></td>
                                        <td></td>
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
