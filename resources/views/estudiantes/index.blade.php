@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')

@section('main-content')             
<div class="col-md-14">
    <button class="btn btn-primary" title="Registrar un nuevo estudiante" onclick="window.location.href = '{{ URL::to('/representantes/create') }}'";>
        <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
    </button>
</div>
    <section class="content">
        <div class="row">
            <div class="col-md-14">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Cédula</th>
                                    <th>Apellido(s)</th>
                                    <th>Nombre(s)</th>
                                    <th>Género</th>
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
                                    </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection