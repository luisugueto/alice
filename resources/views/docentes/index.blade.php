@extends('welcome')

@section('contentheader_title', 'Docentes')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Docentes</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                            {!!link_to_route('docentes.show', $title = '', $parameters = $docentes->id, $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Visualizar cargas académicas'])!!}
                                            @if($docentes->cargo->nombre=="DOCENTE ROTATIVO")
                                                {!!link_to_route('docentes.coordinacion', $title = '', $parameters = $docentes->id, $attributes = ['class'=>'fa fa-group fa-2x','title' => 'Asignar Coordinación de Cursos '])!!}
                                            @endif
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

@endsection