@extends('welcome')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Ver')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">HORARIO [CÓDIGO] [SECCIÓN] [AULA]</div>
            <a href="{{ route('horarios.pdf', [$seccion->id,$curso->id,$periodo->id]) }}" class="btn pull-right"><i class="icon-print"></i></a>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend><strong>PERIODO - {{ $periodo->nombre }}</strong></legend>

                    {!! Form::open(['route' => 'horarios.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                        <div class="box-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="7" style="text-align: center; background-color: #dff0d8;"> DÍAS</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;" colspan="2"> HORA </th>
                                    @foreach($dias as $dia)
                                        <th style="width: 180px; text-align: center;"> {{ $dia->dia }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 9; $i++)
                                    @if($i == 4)
                                        <tr>
                                            <th style="text-align: center; background-color: #d9edf7;" colspan="7"> RECREO </th>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center"> {{ $horas[$i]->bloque }} </td>

                                            @for($j=0; $j < 5; $j++)

                                                @if($i == 0)
                                                    <th style="text-align: center;"> SALUDO</th>
                                                @else
                                                    <td style="text-align: center;">
                                                        @if(asignados($bloques2[$i][$j]->id,$bloques_asignados))
                                                            [{{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }}]
                                                            [{{ $seccion->literal }}]
                                                            [{{ aulas($bloques2[$i][$j]->id, $aulas, $seccion->id) }}]
                                                        @endif
                                                    </td>
                                                @endif

                                            @endfor
                                        </tr>
                                    @endif
                                @endfor
                                </tbody>
                            </table>
                            <div style="padding-top: 25px;">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #dff0d8;">
                                            <th>ASIGNATURA</th>
                                            <th>CÓDIGO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($asignaturas as $asignatura)
                                            <tr>
                                                <td>{{ $asignatura->asignatura }}</td>
                                                <td>{{ $asignatura->codigo }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #dff0d8;">
                                            <th>CURSO</th>
                                            <th>SECCIÓN</th>
                                            <th>CAPACIDAD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $curso->curso }}</td>
                                            <td>{{ $seccion->literal }}</td>
                                            <td>{{ $seccion->capacidad }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-primary btn-flat" onclick="javascript:history.back()">Regresar</button>
                            </div>
                    {!! Form::close() !!}
                </fieldset>

            </div>
        </div>
    </div>

                  
@endsection