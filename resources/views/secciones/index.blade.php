@extends('layouts.app')

@section('htmlheader_title')
    Secciones
@endsection

@section('contentheader_title', 'Secciones')


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
   <div class="col-md-12">
    <button class="btn btn-primary" title="Registrar una nueva seccion" onclick="window.location.href = '{{ route('secciones.create') }}'";>
        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
    </button>

    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Secciones registradas</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <th>Literal</th>
                                        <th>Capacidad</th>
                                        <th>Curso</th>
                                        <th>Opciones</th>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($seccion as $i)
                                    <tr>
                                        <td>{{ $i->literal}}</td>

                                        <td>{{$i->capacidad }}</td>    
                                        <td>{!!link_to_route('secciones.edit', $title = '', $parameters = $i->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>                              

                                        <td>{{ $i->capacidad }}</td>  
                                        <td>{{ $i->curso->curso}}</td>  
                                        <td>{!!link_to_route('secciones.edit', $title = 'Editar', $parameters = $i->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}
                                                {!!link_to_route('secciones.destroy', $title = 'Eliminar', $parameters = $i->id, $attributes = ['class'=>'fa fa-trash fa-2x'])!!}
                                             
                                            </td>                              

                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
@stop