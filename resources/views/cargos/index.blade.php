@extends('layouts.app')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Inicio')


@section('main-content')

<div class="col-md-12">
   
    
    @include('alerts.errors')
    
    <div class="col-md-14">
             <button class="btn btn-primary" title="Registrar Horario" onclick="window.location.href = '{{ URL::to('cargos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>
    
     <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre(s)</th>
                                    <th>Área</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cargo as $cargo)
                                    <tr>
                                        <td>{{ $cargo->nombre}}</td>  
                                        <td>{{ $cargo->area->nombre}}</td> 

                                        
                                        <td>
                                        @if($cargo->nombre!="DOCENTE DE PLANTA" AND $cargo->nombre!="DOCENTE ROTATIVO")
                                        {!!link_to_route('cargos.edit', $title = '', $parameters = $cargo->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}
                                        @endif
                                        </td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>


@endsection