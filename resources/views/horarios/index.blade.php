@extends('layouts.app')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Periodo')


@section('main-content')     
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">               

    <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('horarios/buscar') }}'";>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
    </button><br><br>
   
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Horarios</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Sección</th>
                                    <th>Periodo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                    <tr>
                                        <td>{{$horario->curso}}</td>
                                        <td>{{$horario->literal}}</td>
                                        <td>{{$horario->nombre}}</td>
                                        <td class="text-center">
                                            {!! link_to_route('horarios.show', $title = '', $parameters = $horario->id_seccion, $attributes = ['class'=>'fa fa-eye fa-2x']) !!}
                                            {!! link_to_route('horarios.edit', $title = '', $parameters = $horario->id_seccion, $attributes = ['class'=>'fa fa-edit fa-2x']) !!}
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                    </div>            
                </div>
            
@endsection