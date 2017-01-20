@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Parciales')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">LISTA DE ESTUDIANTES INSCRITOS EN EL PERIODO LECTIVO : {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} )</div>
            </div>
            <?php $id_seccion=$seccion->id; ?>
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
                                        
                                        ?>

                                        @if($q==1 || $q==2)

                                            {{--  @if($parcial==3) --}}
                                            <a href="{{ route('parciales.show',$estudiante->id) }}" class="btn"><i class="icon-eye-open"></i></a>
                                        @else

                                            <a href="{{ route('parciales.edit',$estudiante->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
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
    </div>
               
@endsection