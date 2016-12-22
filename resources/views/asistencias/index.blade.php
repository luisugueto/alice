@extends('layouts.app')

@section('contentheader_title', 'Asistencias')
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
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Procesar Entrada
        </button>
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asistencias/salida') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Procesar Salida
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asistencias</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Personal</th>
                                    <th>Cargo</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <!-- <th>Opciones</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($asistencias)>0)
                                @foreach($asistencias as $key => $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->nombres }} {{ $asistencia->apellido_paterno }}</td>
                                        <td>{{ $asistencia->cargo->nombre }}</td>
                                        <td>{{ $fecha[$key]->entrada }}</td>
                                        <td>{{ $fecha[$key]->salida }}</td>
                                        <!-- <td class="text-center">{!!link_to_route('asistencias.edit', $title = '', $parameters = $asistencia->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td> -->
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                         </table>
                           
                    </div>            
                </div>
            </div>
        </div>
    </section>
@endsection