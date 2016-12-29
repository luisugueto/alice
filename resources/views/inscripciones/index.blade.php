@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Inicio')


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
                        <h3 class="box-title">Esrtudiantes</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
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
                                                <?php $encontrar=0;
                                                $id_estudiante=$estudiante->id;

                                                ?>
                                                @foreach($estudiante->cursos as $key)
                                                    @if($key->pivot->id_periodo == Session::get('periodo') and $key->id_estudiante== $id_estudiante)

                                                        <?php $encontrar++; ?>
                                                    @endif
                                                @endforeach
                                                @if(count($estudiante->cursos)==0 and $encontrar==0)

                                                        <a href="{{ route('inscripciones.edit', $estudiante->id) }}" class="btn btn-primary btn-flat" title="Seleccione para realizar inscripción del estudiante en este periodo"><i class="fa fa-newspaper-o"></i></a>
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
        </div>
    </div>

@endsection