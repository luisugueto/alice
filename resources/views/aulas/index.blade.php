@extends('layouts.app')

@section('htmlheader_title')
    Aulas
@endsection

@section('contentheader_title', 'Aulas')


@section('main-content')                    

<div class="col-md-12"><br><br>
    
    @include('alerts.errors')
     
    <button class="btn btn-primary" title="Registrar un nuevo estudiante" onclick="window.location.href = '{{ route('aulas.create') }}'";>
        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
    </button>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12"><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($aula as $i)
                                    <tr>
                                        <td>{{ $i->nombre}}</td>  
                                        <td>{!!link_to_route('aulas.edit', $title = '', $parameters = $i->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}</td> 
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