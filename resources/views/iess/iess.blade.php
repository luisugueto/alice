@extends('layouts.app')

@section('htmlheader_title')
    IESS
@endsection

@section('contentheader_title', 'IESS')


@section('main-content')     
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
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
                                        <td>Nombre</td>
                                        <td>Valor</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($iess as $i)
                                    <tr>
                                        <td>{{ $i->nombre}}</td>
                                        <td>{{$i->valor }}</td>    
                                        <td>{!!link_to_route('iess.edit', $title = '', $parameters = $i->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>                              
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@stop