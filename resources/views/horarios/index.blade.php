@extends('layouts.app')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Periodo')


@section('main-content')                    
<div class="col-md-12"><br><br> 
    @include('alerts.request')
    @include('alerts.errors')
    <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('horarios/buscar') }}'";>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
    </button><br><br>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
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
                                @foreach($secciones as $seccion)
                                    <tr>
                                        <td>{{$seccion->curso->curso}}</td>
                                        <td>{{$seccion->literal}}</td>
                                        <td>{{$periodo->nombre}}</td>
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
@endsection