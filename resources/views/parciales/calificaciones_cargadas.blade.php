@extends('layouts.app')
@section('contentheader_title', 'Estudiantes')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }} ( {{$periodo->status}} )</h3>
                    </div>
                    <?php $tipo=tipo_docente(); ?>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
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
                                                    <td align="center"> {{buscar_calificacion_parcial(1,$estudiante->id)}}
                                                            <br>

                                                        @if(buscar_calificacion_parcial(1,$estudiante->id) != "Sin Cargar")
                                                            {!! link_to_route('parciales.showparcial', $title = '', $parameters = [1,$estudiante->id], $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Seleccione para ver la Calificación']) !!}

                                                        {{--     {!! link_to_route('parciales.show', $title = '', $parameters = $estudiante->id, $attributes = ['class'=>'fa fa-edit fa-2x','title' => 'Seleccione para rectificación de la Calificación']) !!} --}}
                                                        @endif

                                                    </td>
                                                    <td> {{buscar_calificacion_parcial(2,$estudiante->id)}} </td>
                                                    <td> {{buscar_calificacion_parcial(3,$estudiante->id)}} </td>
                                                    <td> {{buscar_calificacion_quimestre(1,$estudiante->id)}} </td>
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
        </div>
    </div>

@endsection