@extends('welcome')
@section('contentheader_title', 'Estudiantes')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes inscritos en el periodo lectivo : {{ $periodo->nombre }} ( {{$periodo->status}} )
                    <?php $tipo=$docente->cargo->nombre; ?>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Cédula</th>
                                <th>Apellido(s)</th>
                                <th>Nombre(s)</th>
                                <th>Curso</th>
                                <th>Sección</th>
                                @if($tipo!="DOCENTE ROTATIVO")
                                    <th>Pendiente porCargar:</th>
                                    <th>Opciones</th>
                                @endif
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
                                            <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                            <td> {{ $estudiante->nombres }}</td>
                                            <td> {{ $estudiante->curso }} </td>
                                            <td> {{ $estudiante->literal }} </td>

                                            @if($tipo!="DOCENTE ROTATIVO")
                                                <td>{{ buscar($estudiante->id_estudiante)  }}</td>
                                                <td>
                                                    <?php
                                                    $quimestre=buscar_quimestre($estudiante->id);
                                                    $parcial=buscar_parcial($estudiante->id); ?>

                                                    @if($quimestre!=2)

                                                        @if($parcial==3)
                                                            {!! link_to_route('parciales.show', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-plus-square-o fa-2x','title' => 'Seleccione para Agregar Quimestre']) !!}
                                                            <a href="{{ route('parciales.show',$estudiante->id_estudiante) }}">Q</a>
                                                        @else

                                                            {!! link_to_route('parciales.edit', $title = '', $parameters = $estudiante->id_estudiante, $attributes = ['class'=>'fa fa-plus-square fa-2x','title' => 'Seleccione para Agregar Parcial']) !!}
                                                            <a href="{{ route('parciales.edit',$estudiante->id_estudiante) }}">P</a>

                                                    @endif


                                            @endif
                                                </td>
                                            @endif
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