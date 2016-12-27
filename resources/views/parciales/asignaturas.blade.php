@extends('layouts.app')
@section('contentheader_title', 'Asignaturas Asignadas')

@section('main-content')     
<div class="col-md-12">        
    
        <section class="content">
        @if(Session::has('message-error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Asignaturas Asignadas en el periodo lectivo : {{ $periodo->nombre }}( {{$periodo->status}} )</h3>
                        </div>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Asignatura</th>
                                        <th>Curso</th>
                                        <th>Sección</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	@foreach($asignaturas as $asig)
                                	
										<tr>
                                            <td> {{ $asig->asignatura }} </td>
                                            <td> {{ $asig->curso }} </td>
                                            <td> {{ $asig->literal }}</td>
                                            <td>  
                                                {!! link_to_route('parciales.estudiantes', $title = '', $parameters = $asig->id_seccion, $attributes = ['class'=>'fa fa-th-list fa-2x','title' => 'Listar Estudiantes']) !!}
                                            </td>
                                        </tr>
                                            
                                   @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

@endsection