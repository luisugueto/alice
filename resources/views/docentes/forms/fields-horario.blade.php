@if(!empty($periodo))

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
                <tr style="background-color: #f2dede">
                    <th style="text-align: center;" colspan="7"> RECREO </th>
                </tr>
            @else
                <tr>
                    <td colspan="2" class="text-center"> {{ $horas[$i]->bloque }} </td>
                    @for($j=0; $j < 5; $j++)

                        @if($i == 0)
                            <th style="text-align: center;"> SALUDO</th>
                        @else
                            <td style="text-align: center;">
                                @if(bloqueProfesor($bloques2[$i][$j]->id, $asignadas))
                                    [{{ asignaturaProfesor($bloques2[$i][$j]->id, $asignadas) }}]
                                    [{{ seccionProfesor($bloques2[$i][$j]->id, $asignadas) }}]
                                    [{{ aulaProfesor($bloques2[$i][$j]->id, $asignadas) }}]
                                @endif
                            </td>
                        @endif
                    @endfor
                </tr>
            @endif
        @endfor
        </tbody>
    </table>

    <br>

    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #dff0d8;">
                <th>ASIGNATURAS</th>
                <th>CÓDIGO</th>
            </tr>
        </thead>
        <thbody>
            @foreach ($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->asignatura }}</td>
                    <td class="text-center">{{ $asignatura->codigo }}</td>
                </tr>
            @endforeach
        </thbody>
    </table>
@endif