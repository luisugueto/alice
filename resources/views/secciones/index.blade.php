@extends('layouts.app')

@section('contentheader_title', 'Secciones')
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
        <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('secciones/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Secciones</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Literal</th>
                                    <th>Capacidad</th>
                                    <th>Curso</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seccion as $i)
                                    <tr>
                                        <td>{{ $i->literal}}</td>
                                        <td>{{ $i->capacidad }} </td>                                    
                                        <td>{{ $i->curso->curso }}</td>  
                                        <td class="text-center">
                                            {!! link_to_route('secciones.edit', $title = '', $parameters = $i->id, $attributes = ['class'=> 'fa fa-edit fa-2x']) !!}
                                            {!! link_to_route('secciones.destroy', $title = '', $parameters = $i->id, $attributes = ['class'=>'fa fa-trash fa-2x']) !!}
                                        </td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                    </div>            
                </div>
            
@endsection


