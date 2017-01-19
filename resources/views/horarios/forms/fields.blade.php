
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
                                    {{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }}
                                @elseif(asignadas($bloques2[$i][$j]->id,$aulas_asignadas))
                                    <small style="color: red;|">NO DISPONIBLE</small>
                                @else
                                    <input type="checkbox" name="id_bloque[]" value="{{ $bloques2[$i][$j]->id }}" title="Seleccione el día correspondiente de la asignatura" id="id_bloque">
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
                <th class="text-center">CÓDIGO</th>
            </tr>
        </thead>
        <thbody>
            @foreach ($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->asignatura }}</td>
                    <td class="text-center text-red">{{ $asignatura->codigo }}</td>
                </tr>
            @endforeach
        </thbody>
    </table>

