@extends('layouts.app')

@section('htmlheader_title')
    Prestamos y Anticipos
@endsection

@section('contentheader_title', 'Prestamos y Anticipos')


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
    
    <section class="content">
        <div class="row">
            <div class="col-md-14">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <td>Fecha</td>
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Tipo</td>
                                        <td>Monto</td>
                                        <td>Capital</td>
                                        <td>Saldo</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                    @foreach($prestamos as $per)
                                    <tr>
                                        <td>{{$per->fecha }}</td>
                                        <td>{{$per->personal->nombres}}</td>
                                        <td>{{$per->personal->apellido_paterno}} {{ $per->personal->apellido_materno }}</td>
                                        <td>{{$per->tipo}}</td>
                                        <td>{{$per->monto }}</td>
                                        <td>{{$per->remuneracion->sueldo_mens }}</td>
                                        <td>{{ ($per->remuneracion->sueldo_mens - $per->monto) }}</td>
                                        @if($per->tipo == 'Prestamo')
                                        <td> {!!link_to_route('pagos.store', $title = 'Realizar Pago de Prestamo', $parameters = $per->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
                                        @else <td></td> 
                                        @endif                             
                                    </tr>
                                    @endforeach                          
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@stop