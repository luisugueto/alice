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
                                        <th colspan="2">Estado</th>
                                        
                                        <th>Pendiente por Cargar:</th>
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
                                            @if(count($estudiante->cursos)>0)
                                            <td colspan="2"> Inscrito </td>
                                            @else
                                            
                                            <td colspan="2">Sin Inscribir</td>
                                            @endif
                                            <td>{{ buscar_dr($estudiante->id)  }}</td>
                                            <td>  
                                            
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