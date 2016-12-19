@extends('layouts.app')

@section('htmlheader_title')
    Areas de Trabajo
@endsection

@section('contentheader_title', 'Areas de Trabajo')


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
    <button class="btn btn-primary" title="Registrar un nuevo estudiante" onclick="window.location.href = '{{ route('areas.create') }}'";>
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
                                        <td>Nombre</td>
                                        <td>Opciones</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($area as $i)
                                    <tr>
                                        <td>{{ $i->nombre}}</td>  
                                        <td>{!!link_to_route('areas.edit', $title = '',$parameters = $i->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td>                              
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