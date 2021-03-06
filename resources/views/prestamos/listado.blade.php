@extends('welcome')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Inicio')

@section('main-content')

    <div>
        <button type="button" class="btn btn-default" title="Hacer click aquí para exportar los datos a formato Excel.">
            <a href="{{ url('descargarPagosMensual') }}" style="text-decoration: none;"> <span class="text-muted"> <i class="icon-file"></i> .EXCEL</span></a>
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
                                            <td>0</td>
                                            <td>
                                              <a href="{{ route('pagos.update', $per->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                            </td>
                                        @endif
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
