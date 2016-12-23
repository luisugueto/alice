@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')

@section('main-content')     
<div class="col-md-12">        
    <div class="col-md-14">
        <button class="btn btn-primary" title="Registrar un nuevo estudiante" onclick="window.location.href = '{{ URL::to('/representantes/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>
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
                            <h3 class="box-title">Lista de Estudiantes</h3>
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
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($estudiantes as $estudiante)

											<?php 	$encontrar=0;
                                                	$id_estudiante=$estudiante->id;

                                             ?>
                                            @foreach($estudiante->cursos as $key)
                                                    @if($key->pivot->id_periodo == Session::get('periodo') and $key->id_estudiante== $id_estudiante)

                                                        <?php $encontrar++; ?>
                                                    @endif
                                            @endforeach
                                            <tr><td colspan="6">{{$encontrar}}</td></tr>
								
                                            @if(count($estudiante->cursos)==0 and $encontrar>0)
					

                                        <tr>
                                            <td> {{ $estudiante->codigo_matricula }} </td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{ $estudiante->apellidos }}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                            <td> {{ $estudiante->genero }}</td>
                                            <td>  
                                            
                                            
                                                    
                                                {!! link_to_route('inscripciones.edit', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-newspaper-o fa-2x','title' => 'Seleccione para realizar inscripción del estudiante en este periodo']) !!}
                                          </td>
                                        </tr>
                                            @endif
                                          
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