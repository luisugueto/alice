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
                                        @if(Auth::user()->roles_id == 1)
                                        <td class="text-center">
                                            <a href="{{ route('docentes.show', $docentes->id) }}" class="btn"><i class="icon-eye-open"></i></a>

                                            @if($docentes->cargo->nombre == "DOCENTE ROTATIVO")
                                                <a href="{{ route('docentes.coordinacion', $docentes->id) }}" class="btn"><i class="icon-asterisk"></i></a>
                                            @endif
                                        </td>
                                        @else

                                            @if(Auth::user()->roles_id == 5)

                                                <td><a tabindex="-1" title="Ver asignaturas asignadas" href="{{ route('docentes.show',[$docentes->id]) }}" class="btn"><i class="icon-eye-open"></i></a></td>
            

                                            @endif



                                        @endif
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