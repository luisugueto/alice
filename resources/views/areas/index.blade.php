@extends('layouts.app')

@section('contentheader_title', 'Areas')
@section('contentheader_description', 'Inicio')


@section('main-content')    

    <div class="col-md-12">
   
    
    @include('alerts.errors')
    @include('alerts.request')
    
    <div class="col-md-14">
            <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('areas/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Areas</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Area</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($area as $area)
                                    <tr>
                                        <td>{{ $area->nombre}}</td>  
                                        <td>{{ $area->created_at }}</td>
                                        <td>{{ $area->updated_at }}</td>
                                        <td class="text-center">{!!link_to_route('areas.edit', $title = '',$parameters = $area->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>

@endsection