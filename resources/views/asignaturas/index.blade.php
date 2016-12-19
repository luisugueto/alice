@extends('layouts.app')

@section('htmlheader_title')
    Asignaturas
@endsection

@section('contentheader_title', 'Asignaturas')


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
    <button class="btn btn-primary" title="Registrar una nueva asignatura" onclick="window.location.href = '{{ route('asignaturas.create') }}'";>
        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
    </button>
    </div>
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
                                        <td>Asignatura</td>
                                        <td>Código</td>
                                        <td>Curso</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($asignaturas as $i)
                                    <tr>
                                        <td>{{ $i->asignatura }}</td>  
                                        <td>{{ $i->codigo }}</td>  
                                        <td>{{ $i->cursos->curso }}</td>
                                        <td>{!!link_to_route('asignaturas.edit', $title = 'Editar', $parameters = $i->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>                              
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