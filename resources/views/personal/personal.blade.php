@extends('layouts.app')

@section('htmlheader_title')
    Personal
@endsection

@section('contentheader_title', 'Personal')


@section('main-content')                    
<div class="col-md-12">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @include('alerts.errors')
    
    <div class="col-md-14">
            <button class="btn btn-primary" title="Registrar personal" onclick="window.location.href = '{{ URL::to('/nuevo_personal') }}'";>
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Nuevo</button>
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
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Cedula</td>
                                        <td>Cargo</td>
                                        <td>Fecha Ingreso</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($personal as $per)
                                    <tr>
                                        <td>{{$per->nombres}}</td>
                                        <td>{{$per->apellido_paterno}} {{ $per->apellido_materno }}</td>
                                        <td>{{$per->cedula}}</td>
                                        <td>{{$per->cargo->nombre}}</td>
                                        <td>{{$per->fecha_ingreso}}</td>      
                                        <td>{!!link_to_route('personal.edit', $title = 'Editar', $parameters = $per->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@stop