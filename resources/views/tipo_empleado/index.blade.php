@extends('layouts.app')

@section('htmlheader_title')
    Tipo de Empleados
@endsection

@section('contentheader_title', 'Tipos de Empleados')


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
     
<div class="col-md-12">
    <section class="content">
   <div class="col-md-14">
    <button class="btn btn-primary" title="Registrar un nuevo cargo" onclick="window.location.href = '{{ route('tipo_empleado.create') }}'";>
        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
    </button>
    </div>
        <div class="row">
            <div class="col-md-14">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Tipo de Empleados</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead align="center">
                                <tr>
                                        <td>Nombre</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($tipo_empleado as $tipo_empleado)
                                    <tr>
                                        <td>{{ $tipo_empleado->tipo_empleado}}</td> 
                                        <td> 
                                         <a href="{{ route('tipo_empleado.edit', [$tipo_empleado->id]) }}"><button class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede editar el registro" ><i class="fa fa-edit"></i></button></a>

                                        {!!link_to_route('tipo_empleado.destroy', $title = '', $parameters = $tipo_empleado->id.'/destroy', $attributes = ['class'=>'btn btn-danger fa fa-close fa-2x'])!!}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop