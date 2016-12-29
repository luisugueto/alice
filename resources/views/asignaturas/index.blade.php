@extends('layouts.app')

@section('contentheader_title', 'Asignaturas')
@section('contentheader_description', 'Inicio')


@section('main-content')      


<div class="col-md-12">
   
    
    @include('alerts.errors')
    
    <div class="col-md-14">
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('asignaturas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asignaturas</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Código</th>
                                    <th>Curso</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asignaturas as $asignatura)
                                    <tr>
                                        <td>{{ $asignatura->asignatura }}</td>  
                                        <td>{{ $asignatura->codigo }}</td>  
                                        <td>{{ $asignatura->cursos->curso }}</td>
                                        <td class="text-center">{!!link_to_route('asignaturas.edit', $title = '',$parameters = $asignatura->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
    
@endsection