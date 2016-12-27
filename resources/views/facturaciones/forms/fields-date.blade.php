@extends('layouts.app')

@section('contentheader_title', 'Morosos')
@section('contentheader_description', 'Inicio')


@section('main-content')                    
<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 10px;">
            @include('alerts.request')
            @include('alerts.errors') 
        </div>  
    </div> 
    <div class="col-md-1">
        <div class="row" style="padding-top: 5px">
        <button type="button" class="btn btn-block btn-default btn-flat" title="Hacer click aquí para exportar los datos a formato Excel."><a href="{{ url('descargarMorosos') }}"> <span class="text-light-blue">Excel</span></a>
        </button>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Morosos</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre(s)</th>
                                    <th>Teléfono</th>
                                    <th>Estudiante</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($morosos as $key => $morosos)
                                    <tr>
                                        <td>{{$morosos->cedula_re}}</td>
                                        <td>{{$morosos->nombres_re}}</td>
                                        <td>{{$morosos->telefono_re}}</td> 
                                        <td>{{$morosos->nombres}}</td> 
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