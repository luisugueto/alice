@extends('layouts.app')
@section('contentheader_title', 'Estudiantes')

@section('main-content')     
<div class="col-md-12">        
    
        <section class="content">
        @if(Session::has('message-error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }}( {{$periodo->status}} )</h3>
                            <br><h3>
                            Curso: {{$seccion->curso->curso}}
                            Sección: {{$seccion->literal}}
                            </h3>
                        </div>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Cédula</th>
                                        <th>Apellido(s)</th>
                                        <th>Nombre(s)</th>
                                        <th>Cargar a:</th>
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
                                            <td>{{ buscar($estudiante->id)  }}</td>
                                            <td>  
                                            <?php 
                                            $quimestre=buscar_quimestre($estudiante->id);
                                            $parcial=buscar_parcial($estudiante->id); ?>

                                                @if($quimestre!=2)
        
                                                    @if($parcial==3)
                                                {!! link_to_route('parciales.show', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-plus-square-o fa-2x','title' => 'Seleccione para Agregar Quimestre']) !!}
                                                    @else

                                                {!! link_to_route('parciales.edit', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-plus-square fa-2x','title' => 'Seleccione para Agregar Parcial']) !!}
                                                
                                                    @endif
                                                                          

                                                @endif
                                          </td>
                                        </tr>
                                            
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

@endsection