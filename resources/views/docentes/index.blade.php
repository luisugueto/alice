@extends('layouts.app')

@section('htmlheader_title')
    Docentes
@endsection

@section('contentheader_title', 'Docentes')


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
                        <h3 class="box-title">Docentes</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Cédula</th>
                                        <th>Tipo</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($docentes as $docentes)
                                        @if($docentes->cargo->empleado->tipo_empleado=="DOCENTE")
                                            <tr>
                                                <td> {{$docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres}}</td>
                                                <td> {{$docentes->cedula}}</td>
                                                <td> {{$docentes->cargo->nombre}}</td>
                                                <td class="text-center">
                                                    {!!link_to_route('docentes.show', $title = '', $parameters = $docentes->id, $attributes = ['class'=>'fa fa-eye fa-2x'])!!}
                                                </td>
                                            </tr>
                                        @endif
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