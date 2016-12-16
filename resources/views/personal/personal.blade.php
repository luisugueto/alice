@extends('layouts.app')

@section('htmlheader_title')
    Personal
@endsection


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

                        <h2 class="titulo">
                            Personal
                            <br><small>Datos del personal.</small>
                        </h2>
                        <hr>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <button class="btn btn-primary" title="Registrar personal" onclick="window.location.href = '{{ URL::to('/nuevo_personal') }}'";>
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Nuevo</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <table class="table table-condensed table-hover">
                                <thead align="center" style="background-color: white;">
                                    <tr>
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Cedula</td>
                                        <td>Correo</td>
                                        <td>Cargo</td>
                                        <td>Especialidad</td>
                                        <td>Fecha Ingreso</td>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                
                                @foreach($personal as $per)
                                    <tr>
                                        <td>{{$per->nombres}}</td>
                                        <td>{{$per->apellido_paterno}} {{ $per->apellido_materno }}</td>
                                        <td>{{$per->cedula}}</td>
                                        <td>{{$per->correo}}</td>
                                        <td>{{$per->cargo->nombre}}</td>
                                        <td>{{$per->especialidad}}</td>
                                        <td>{{$per->fecha_ingreso}}</td>                                    
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                             <nav>
                              <ul class="pagination">
                                <li>{{ $personal->links() }}
                              </ul>
                            </nav>
                        </div>
                        
                    </div>
@stop