@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inscritos')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }} ( {{$periodo->status}} )</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Matrículasss</th>
                                <th>Cédula</th>
                                <th>Apellido(s)</th>
                                <th>Nombre(s)</th>
                                <th>Estado</th>
                                <th>Pendiente por Cargar:</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td> {{ $estudiante->codigo_matricula }} </td>
                                    <td> {{ $estudiante->cedula }} </td>
                                    <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                    <td> {{ $estudiante->nombres }}</td>
                                    @if(count($estudiante->cursos)>0)
                                        <td > Inscrito </td>
                                    @else
                                        <td >Sin Inscribir</td>
                                    @endif

                            @if(count($estudiante->cursos)>0 && Auth::user()->roles_id == 5)
                                   
                                   <?php 
                                   $id_seccion=buscar_id_seccion($estudiante->id);
                                   $q=buscar_mi_asignatura_parcial($estudiante->id,$id_seccion); 


                                    ?>

                                    <td>
                                        @if($q==1)
                                            1 er Quimestre
                                        @else

                                            @if($q==2)
                                                2 do Quimestre

                                            @else
                                                    
                                                {{ buscar_dr($estudiante->id,2)  }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                    
                                    @if(buscar_cargadas_todas($id_seccion,$estudiante->id)==1)
                                        <?php
                                        $quimestre=buscar_quimestre($estudiante->id);
                                        $parcial=buscar_parcial($estudiante->id);
                                        
                                        ?>
                                        @if($q!=3)
                                            @if($q==1 || $q==2) 

                                                
                                                <a href="{{ route('parciales.mostrarasignaturas',[2,$estudiante->id]) }}" class="btn"><i class="icon-eye-open"></i></a>
                                            @else
                                                    
                                                <a href="{{ route('parciales.mostrarasignaturas',[1,$estudiante->id]) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
                                                

                                            @endif
                                        @endif
                                    @else
                                        No se han asignado todas las asignaturas

                                    @endif
                                    </td>
                            @else
                                                    
                                               <td> {{ buscar_dr($estudiante->id,2)  }}</td>
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

@endsection