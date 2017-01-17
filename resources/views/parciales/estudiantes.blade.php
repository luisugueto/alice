@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Parciales')

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
                            <h3 class="box-title">Lista de Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }}( {{$periodo->status}} )</h3>
                            <br><h3>
                            Curso: {{$seccion->curso->curso}}
                            Sección: {{$seccion->literal}}
                            <?php $id_seccion=$seccion->id; ?>
                            </h3>
                        </div>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Cédula</th>
                                        <th>Apellido(s)</th>
                                        <th>Nombre(s)</th>
                                        <th>Pendiente por Cargar:</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                
                                    @foreach($estudiantes as $estudiante)
                                       
										<tr>
                                            <td> {{ $estudiante->codigo_matricula }}</td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                           <?php $q=buscar_mi_asignatura_parcial($estudiante->id,$id_seccion); ?>
                                            
                                            <td>

                                           
                                            @if($q==1)
                                                1 er Quimestre
                                                @else

                                                    @if($q==2)
                                                        2 do Quimestre

                                                        @else
                                                            {{ buscar_dr($estudiante->id)  }}
                                                    @endif
                                            @endif
                                                    </td>
                                            <td>  
                                            <?php 
                                            $quimestre=buscar_quimestre($estudiante->id);
                                            $parcial=buscar_parcial($estudiante->id); 
                                             ?>{{$q}}

                                                @if($q==1 || $q==2)
        
                                                   {{--  @if($parcial==3) --}}
                                                {!! link_to_route('parciales.show', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-plus-square-o fa-2x','title' => 'Seleccione para Agregar Quimestre']) !!}
                                                    <a href="{{ route('parciales.show',$estudiante->id) }}">Q</a>
                                                    @else

                                                {!! link_to_route('parciales.edit', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-plus-square fa-2x','title' => 'Seleccione para Agregar Parcial']) !!}
                                                <a href="{{ route('parciales.edit',$estudiante->id) }}">P</a>
                                                
                                                   {{--  @endif --}}
                                                                          

                                                @endif
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
               
@endsection