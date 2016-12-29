@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')

@section('main-content')     
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }}( {{$periodo->status}} )</h3>
                        </div>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Cédula</th>
                                        <th>Apellido(s)</th>
                                        <th>Nombre(s)</th>
                                        <th>Género</th>
                                        <th>Curso</th>
                                        <th>Sección</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($estudiantes as $estudiante)

										<tr>
                                            <td> {{ $estudiante->codigo_matricula }} </td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                            <td> {{ $estudiante->genero }}</td>
                                            <td> {{ $estudiante->curso }} </td>
                                            <td> {{ $estudiante->literal }} </td>
                                            <td>  
                                            
                                            
                                                    
                                                {!! link_to_route('inscripciones.cambiarseccion.buscar', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-exchange fa-2x','title' => 'Seleccione para Cambiar de Seccion']) !!}
                                                {!! link_to_route('certificados.matricula', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-print fa-2x','title' => 'Imprimir Certificado de Matrícula']) !!}
                                          </td>
                                        </tr>
                                            
                                          
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
             
@endsection