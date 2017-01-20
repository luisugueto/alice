@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Calificaciones')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">ESTUDIANTES INSCRITOS EN EL PERIODO LECTIVO : {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} )</div>
            </div>

            <?php $tipo=tipo_docente(); ?>

            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Cédula</th>
                                <th>1P-1Q</th>
                                <th>2P-1Q</th>
                                <th>3P-1Q</th>
                                <th>1Q</th>
                                <th>1P-2Q</th>
                                <th>2P-2Q</th>
                                <th>3P-2Q</th>
                                <th>2Q</th>
                                <th>Total Anual</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($docentes as $doc)

                                <?php $id_seccion= $doc->id_seccion; ?>

                                @foreach($estudiantes as $estudiante)
                                    @if($id_seccion==$estudiante->id_seccion)
                                        <tr>
                                            <td> {{ $estudiante->codigo_matricula }} </td>
                                            <td> {{ $estudiante->cedula }} </td>
                                            <td> {{buscar_calificacion_parcial(1,$estudiante->id)}}

                                                <br>

                                                @if(buscar_calificacion_parcial(1,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(1,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 1 er parcial del 1 er quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  
                                                  <a href="{{ route('parciales.showparcial',[1,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>

                                                
                                                @endif

                                            </td>
                                            <td> {{buscar_calificacion_parcial(2,$estudiante->id)}}
                                                <br>

                                                @if(buscar_calificacion_parcial(2,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(2,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 2 do parcial del 1 er quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                 <a href="{{ route('parciales.showparcial',[2,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>
                                                
                                                @endif
                                             </td>
                                            <td> {{buscar_calificacion_parcial(3,$estudiante->id)}} 

                                                <br>

                                                @if(buscar_calificacion_parcial(3,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(3,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 3 er parcial del 1 er quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  <a href="{{ route('parciales.showparcial',[3,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>
                                                
                                                @endif
                                                </td>
                                            <td> {{buscar_calificacion_quimestre(1,$estudiante->id)}} 
                                                <br>

                                                @if(buscar_calificacion_quimestre(1,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_quimestral=buscar_id_quimestre(1,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar el examen quimestral" onclick="window.location.href = '{{ route('parciales.show-rectificar-quimestral',$id_quimestral) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                 <a href="{{ route('parciales.showquimestre',[1,$estudiante->id]) }}" class="btn" title="Ver calificaciones del quimestre cargadas"><i class="icon-eye-open"></i></a>
                                                
                                                @endif
                                            </td>
                                            <td> {{buscar_calificacion_parcial(4,$estudiante->id)}} 
                                                <br>
                                             @if(buscar_calificacion_parcial(4,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(4,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 1 er parcial del 2 do quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  
                                                <a href="{{ route('parciales.showparcial',[4,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>

                                                
                                                @endif

                                            </td>
                                            <td> {{buscar_calificacion_parcial(5,$estudiante->id)}} 
                                                <br>
                                             @if(buscar_calificacion_parcial(5,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(5,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 2 do parcial del 2 do quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                <a href="{{ route('parciales.showparcial',[4,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>

                                                
                                                @endif
 </td>
                                            <td> {{buscar_calificacion_parcial(6,$estudiante->id)}}  
                                                <br>

                                             @if(buscar_calificacion_parcial(6,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_parcial=buscar_id_parcial(6,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar la calificación del 1 er parcial del 2 do quimestre" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                 <a href="{{ route('parciales.showparcial',[6,$estudiante->id]) }}" class="btn" title="Ver calificaciones del parcial cargadas"><i class="icon-eye-open"></i></a>

                                                
                                                @endif
                                            </td>
                                            <td> {{buscar_calificacion_quimestre(2,$estudiante->id)}}
                                                <br>

                                                @if(buscar_calificacion_quimestre(2,$estudiante->id) != "SIN CARGAR")
                                                    <?php $id_quimestral=buscar_id_quimestre(2,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Rectificar el examen quimestral" onclick="window.location.href = '{{ route('parciales.show-rectificar-quimestral',$id_quimestral) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                 <a href="{{ route('parciales.showquimestre',[2,$estudiante->id]) }}" class="btn" title="Ver calificaciones del quimestre cargadas"><i class="icon-eye-open"></i></a>

                                                
                                                @endif
                                            </td>

                                            <td align="center">
                                                <?php 

                                                    $q1=buscar_calificacion_quimestre(1,$estudiante->id);
                                                    $q2=buscar_calificacion_quimestre(2,$estudiante->id);

                                                    $uno=buscar_calificacion_quimestre(1,$estudiante->id);
                                                    $dos=buscar_calificacion_quimestre(2,$estudiante->id);

                                                    $suma=$uno+$dos;

                                                    $promedio=$suma/2;

                                                    $promedio=number_format($promedio,2,".",",");

                                                ?>
                                                

                                                     
                                                      @if($q1!="SIN CARGAR" AND $q2!="SIN CARGAR")

                                                    {!! Form::open(['route' => 'parciales.acciones_anuales', 'method' => 'POST', 'id' => 'form', 'class'=>'form-vertical']) !!}

                                                    {!! Form::hidden('id_estudiante',$estudiante->id) !!}
                                                    
                                                    
                                                    <div class="control-group">
                                                        {!! Form::label('promedio', $promedio, ['class'=>'control-label']) !!}
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <div class="controls">
                                                    <select name="accion" id="accion" class="input-xlarge select" title="SELECCIONE LA ACCIÓN QUE DESEA EJECUTAR" , style="width:10em">
                                                    <option value="">SELECCIONE</option>
                                                     @if($q1!="SIN CARGAR" AND $q2!="SIN CARGAR")
                                                        
                                                        <option value="1">REPORTE ANUAL</option>

                                                        <?php 
                                                        $cuantos=cuantos_recuperativos_cargados($estudiante->id); 
                                                        //$nota=0;
                                                        $nota=calificacion_recuperativo($estudiante->id);
                                                        ?>

                                                        @if($promedio<6 AND $cuantos<4 AND $nota<6)

                                                           
                                                             <option value="2">RECUPERATIVO</option>
                                                                                    
                                                        @endif

                                                        @if($cuantos>0 AND $cuantos<=4 AND $nota<6)

                                                        
                                                            <option value="3">RECTIFICAR</option>
                                                        @endif


                                                     @endif   


                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="controls">

                                                    <button type="submit" class="btn btn-primary btn-flat">Enviar</button>
                                                    </div>
                                                </div>

                                                    {!! Form::close() !!}
                        

                                                    @endif
                                            </td>
                                    

                                        </tr>

                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection