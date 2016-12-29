@extends('layouts.app')

@section('contentheader_title', 'Aulas')
@section('contentheader_description', 'Inicio')


@section('main-content')
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">    
                    <button class="btn btn-primary" title="Registrar Asignatura" onclick="window.location.href = '{{ URL::to('aulas/create') }}'";>
                        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
                    </button>
    
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Aulas</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Aula</th>
                                    <th>Creada</th>
                                    <th>Actualizada</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aula as $aula)
                                    <tr>
                                        <td>{{$aula->nombre}}</td>
                                        <td>{{$aula->created_at}}</td>
                                        <td>{{$aula->updated_at }}</td>
                                        <td class="text-center">{!!link_to_route('aulas.edit', $title = '', $parameters = $aula->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>            
                </div>
            
@endsection