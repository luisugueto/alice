@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')
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
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('representante/buscar') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Estudiantes</h3>
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
                                    <tr>
                                        <td> {{ $estudiante->codigo_matricula }} </td>
                                        <td> {{ $estudiante->cedula }} </td>
                                        <td> {{ $estudiante->apellidos }}</td>
                                        <td> {{ $estudiante->nombres }}</td>
                                        <td> {{ $estudiante->genero }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                                            <a href="{{ route('estudiantes.destroy', $estudiante->id) }}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                        </td>
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
