@extends('welcome')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Registro de Calificaciones por Categoría')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">LISTA DE ESTUDIANTES INSCRITOS EN EL PERIODO LECTIVO: {{ $periodo->nombre }} ( {{ strtoupper($periodo->status) }} )<br>
                Asignatura: {{$asignatura->asignatura}}- Código: {{$asignatura->codigo}}</div>
            </div>
            <?php $id_seccion=$seccion->id;
                $id_asignatura=$asignatura->id; ?>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Cédula</th>
                                <th>Apellido(s)</th>
                                <th>Nombre(s){{$id_asignatura}}</th>
                                @foreach($categorias as $catg)
                                    <?php $categoria= str_limit($catg->categoria,15); ?>
                                    <th>{{ $categoria}}</th>
                                @endforeach
                            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)

                                <tr>
                                    <td> {{ $estudiante->codigo_matricula }}</td>
                                    <td> {{ $estudiante->cedula }} </td>
                                    <td> {{ $estudiante->apellido_paterno }} {{$estudiante->apellido_materno}}</td>
                                    <td> {{ $estudiante->nombres }}</td>
                                    @foreach($categorias as $cat)
                                                <td>
                                                    
                                                </td>
                                    @endforeach
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