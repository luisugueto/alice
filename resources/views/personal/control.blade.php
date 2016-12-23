@extends('layouts.app')

@section('htmlheader_title')
    Control de Pagos
@endsection

@section('contentheader_title', 'Control de Pagos')


@section('main-content')                    
<div class="col-md-12">
   
    @include('alerts.errors')
    
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
    <div class="col-md-1">
        <div class="row" style="padding-top: 5px">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel."><a href="{{ url('descargarControl') }}"> <span class="text-light-blue">Excel</span></a>
        </button>
        </div>
    </div>
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
                                        <td>Nombre y Apellido</td>
                                        <td>Cedula</td>
                                        <td>Cargo</td>
                                        <td>Area de Trabajo</td>
                                        <td>Capital</td>
                                        <td>Prestamos y Anticipos</td>
                                        <td>Dcto Retardo Asistencia</td>
                                        <td>Pago Total</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($personal as $per)
                                    <tr>
                                        <td>{{$per->nombres}} {{$per->apellido_paterno}}</td>
                                        <td>{{$per->cedula}}</td>
                                        <td>{{$per->cargo->nombre}}</td>
                                        <td>{{$per->cargo->area->nombre}}</td>
                                        <td>{{ remuneracion($per->id) }}</td>
                                        <td>{{ totalPrestamos($per->id) }}</td>
                                        <td>{{ (remuneracion($per->id)*0.001)*retardoAsistencia($per->id) }}</td>
                                        <td>{{ (remuneracion($per->id)-totalPrestamos($per->id))-(remuneracion($per->id)*0.001)*retardoAsistencia($per->id) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@stop