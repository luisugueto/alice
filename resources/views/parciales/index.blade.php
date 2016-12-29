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

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }}( {{$periodo->status}} )</h3>
                        </div>
                   <?php $tipo=tipo_docente(); ?>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Cédula</th>
                                        <th>Apellido(s)</th>
                                        <th>Nombre(s)</th>
                                        <th>Curso</th>
                                        <th>Sección</th>
                                        @if($tipo!="DOCENTE ROTATIVO")
                                        <th>Pendiente porCargar:</th>
                                        <th>Opciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($docentes as $doc)

                                <?php $id_seccion= $doc->id_seccion; ?>
                                
                                    @foreach($estudiantes as $estudiante)
                                        @if($id_seccion==$estudiante->id_seccion)
										<tr>
                                            <td> {{ $estudiante->codigo_matricula }} </td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                            <td> {{ $estudiante->curso }} </td>
                                            <td> {{ $estudiante->literal }} </td>
                                            
                                            @if($tipo!="DOCENTE ROTATIVO")
                                            <td>{{ buscar($estudiante->id_estudiante)  }}</td>
                                            <td>  
                                            <?php 
                                            $quimestre=buscar_quimestre($estudiante->id);
                                            $parcial=buscar_parcial($estudiante->id); ?>

                                                @if($quimestre!=2)
        
                                                    @if($parcial==3)
                                                {!! link_to_route('parciales.show', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-plus-square-o fa-2x','title' => 'Seleccione para Agregar Quimestre']) !!}
                                                    @else

                                                {!! link_to_route('parciales.edit', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-plus-square fa-2x','title' => 'Seleccione para Agregar Parcial']) !!}
                                                
                                                    @endif
                                                                          

                                                @endif
                                          </td>
                                          @endif
                                        </tr>
                                            
                                       @endif
                                @endforeach
            
                            @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
              
@endsection