@extends('welcome')

@section('contentheader_title', 'Inscripción')
@section('contentheader_description', 'Inicio')


@section('main-content')
<?php $id_periodo = Session::get('periodo'); ?>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Estudiantes</div>
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
                                <th>Género</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td> {{ $estudiante->codigo_matricula }} </td>
                                    <td> {{ $estudiante->cedula }} </td>
                                    <td> {{ $estudiante->apellidos }}</td>
                                    <td> {{ $estudiante->nombres }}</td>
                                    <td> {{ $estudiante->genero }}</td>
                                    <td class="text-center">
                                        <?php 

                                        $id_estudiante=$estudiante->id;
                                            $encontrar=buscar_inscrito($id_estudiante,$id_periodo);
                                        ?>
                                        

                                        @if($encontrar==0)

                                            <a href="{{ route('inscripciones.edit', $estudiante->id) }}" class="btn" title="Seleccione para realizar inscripción del estudiante en este periodo"><i class="icon-list-alt"></i></a>
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