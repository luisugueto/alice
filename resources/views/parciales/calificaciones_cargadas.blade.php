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

                                                @if(buscar_calificacion_parcial(1,$estudiante->id) != "Sin Cargar")
                                                    <?php $id_parcial=buscar_id_parcial(1,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  {{--   {!! link_to_route('parciales.showparcial', $title = '', $parameters = [1,$estudiante->id], $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Seleccione para ver la Calificación']) !!} --}}

                                                
                                                @endif

                                            </td>
                                            <td> {{buscar_calificacion_parcial(2,$estudiante->id)}}
                                                <br>

                                                @if(buscar_calificacion_parcial(2,$estudiante->id) != "Sin Cargar")
                                                    <?php $id_parcial=buscar_id_parcial(2,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  {{--   {!! link_to_route('parciales.showparcial', $title = '', $parameters = [1,$estudiante->id], $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Seleccione para ver la Calificación']) !!} --}}

                                                
                                                @endif
                                             </td>
                                            <td> {{buscar_calificacion_parcial(3,$estudiante->id)}} 

                                                <br>

                                                @if(buscar_calificacion_parcial(3,$estudiante->id) != "Sin Cargar")
                                                    <?php $id_parcial=buscar_id_parcial(3,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_parcial) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  {{--   {!! link_to_route('parciales.showparcial', $title = '', $parameters = [1,$estudiante->id], $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Seleccione para ver la Calificación']) !!} --}}

                                                
                                                @endif
                                                </td>
                                            <td> {{buscar_calificacion_quimestre(1,$estudiante->id)}} 
                                                <br>

                                                @if(buscar_calificacion_quimestre(1,$estudiante->id) != "Sin Cargar")
                                                    <?php $id_parcial=buscar_id_quimestre(1,$estudiante->id); ?>

                                                    <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('parciales.show-rectificar-parcial',$id_quimestre) }}'";>
                                                        <span class="fa fa-plus" aria-hidden="true"></span> Rectificar
                                                        
                                                    </button>
                                                  {{--   {!! link_to_route('parciales.showparcial', $title = '', $parameters = [1,$estudiante->id], $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Seleccione para ver la Calificación']) !!} --}}

                                                
                                                @endif
                                            </td>
                                            <td> {{buscar_calificacion_parcial(4,$estudiante->id)}} </td>
                                            <td> {{buscar_calificacion_parcial(5,$estudiante->id)}} </td>
                                            <td> {{buscar_calificacion_parcial(6,$estudiante->id)}} </td>
                                            <td> {{buscar_calificacion_quimestre(2,$estudiante->id)}} </td>

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