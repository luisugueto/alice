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
                        @if(count($aulas) != '')
                            @if(asignados($bloques2[$i][$j]->id,$bloques_asignados))  
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="eliminar({{$curso->id}},{{asignaturas_id($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id)}},{{asignados_id($bloques2[$i][$j]->id,$bloques_asignados)}},{{ asignadas_id($bloques2[$i][$j]->id,$aulas)}},{{$seccion->id}})"> {{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }} </a>
                            @endif
                        @endif
                            </td>
                        @endif
                    @endfor
                </tr>
            @endif
        @endfor
    </tbody>
</table>
                           

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ELIMINAR ASIGNATURA</h4>
            </div>
            <div class="modal-body">
                ¿Esta seguro que desea eliminar la asignatura de este horario, en el bloque específico?...
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-flat pull-left" data-dismiss="modal">Cancelar</button>
                {!!Form::open(['route' => ['horarios.destroy', $curso->id], 'method' => 'delete']) !!}
                <input type="hidden" id="curso" name="id_curso">
                <input type="hidden" id="seccion" name="id_seccion">
                <input type="hidden" id="asignatura" name="id_asig">
                <input type="hidden" id="bloque" name="id_bloque">
                <input type="hidden" id="aula" name="id_aula">
                <button type="submit" class="btn btn-primary pull-right btn-flat">Aceptar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>