@extends('welcome')

@section('contentheader_title', 'Coordinación de Curso')
@section('contentheader_description', 'Estudiantes Inscritos')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">ESTUDIANTES INSCRITOS EN EL PERIODO LECTIVO : {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} ) </div>
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
                                <th>Pendiente por Cargar:</th>
                                <th>Parciales/Quimestres</th>
                                <th>Anuales</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($buscar as $estudiante)
                                    <tr>
                                        <td> {{ $estudiante->codigo_matricula }} </td>
                                        <td> {{ $estudiante->cedula }} </td>
                                        <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                        <td> {{ $estudiante->nombres }}</td>
                                        <td> {{ buscar_curso2($estudiante->id) }} Secc: {{ buscar_seccion($estudiante->id) }}  </td>
                                        <td>{{ buscar_dr($estudiante->id)  }}</td>
                                        <td>
                                            @if(cargas_completas($estudiante->id,1)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,1); ?>
                                                <a href=""><button type="button" class="btn btn-info">P1</button></a>
                                            @endif

                                            @if(cargas_completas($estudiante->id,2)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,2); ?>
                                                <a href=""><button type="button" class="btn btn-warning">P2</button></a>
                                            @endif

                                            @if(cargas_completas($estudiante->id,3)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,3); ?>
                                                <a href=""><button type="button" class="btn btn-info">P1</button></a>
                                                @if(cargas_completas_quimestre($estudiante->id,1)==1)

                                                    <a href=""><button type="button" class="btn btn-default">Q1</button></a>

                                                @endif
                                            @endif
                                            @if(cargas_completas($estudiante->id,4)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,4); ?>
                                                <a href=""><button type="button" class="btn btn-info">P4</button></a>
                                            @endif

                                            @if(cargas_completas($estudiante->id,5)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,5); ?>
                                                <a href=""><button type="button" class="btn btn-warning">P5</button></a>
                                            @endif

                                            @if(cargas_completas($estudiante->id,6)==1)
                                                <?php $id_parcial=cargas_completas_parcial($estudiante->id,6); ?>
                                                <a href=""><button type="button" class="btn btn-info">P6</button></a>
                                                @if(cargas_completas_quimestre($estudiante->id,2)==1)

                                                    <a href=""><button type="button" class="btn btn-default">Q2</button></a>

                                                @endif
                                            @endif
                                        </td>
                                        <td>

                                            @if(cargas_completas($estudiante->id,6)==1)

                                                @if(cargas_completas_quimestre($estudiante->id,2)==1)

                                                    <a href=""><button type="button" class="btn btn-default">Notas</button></a>

                                                @endif
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
    </div>

@endsection