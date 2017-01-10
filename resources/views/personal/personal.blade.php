@extends('layouts.app')

@section('contentheader_title', 'Personal')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>
        @if(verificarPeriodo()=='activo')
            <div class="col-xs-12">
                <button class="btn btn-primary" title="Registrar personal" onclick="window.location.href = '{{ URL::to('/nuevo_personal') }}'";>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nuevo
                </button>
            </div>
        @endif
            <div class="col-xs-12" style="padding-top: 20px">
                   <!-- <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de Personal</h5>
          </div>
          <div class="table-responsive">
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">   -->
            <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Personal</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre(s)</th>
                                            <th>Apellidos</th>
                                            <th>Cédula</th>
                                            <th>Cargo</th>
                                            <th>Área de Trabajo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($personal as $per)
                                        <tr>
                                            <td>{{$per->nombres}}</td>
                                            <td>{{$per->apellido_paterno}} {{ $per->apellido_materno }}</td>
                                            <td>{{$per->cedula}}</td>
                                            <td>{{$per->cargo->nombre}}</td>
                                            <td>{{$per->cargo->area->nombre}}</td>
                                    @if(verificarPeriodo()=='activo')
                                            <td>
                                                <!-- <a href="{{ route('personal.show', $per->id) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a> -->
                                                 <a href="{{ route('personal.edit', $per->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i></a>
                                                <a href="personal/{{ $per->id }}/destroy" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                            </td>
                                    @else
                                            <td></td>
                                    @endif
                                        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection