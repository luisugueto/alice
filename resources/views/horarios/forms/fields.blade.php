<div class="col-md-12">
    <div class="box-body no-padding">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="7" class="text-center"> DÍAS</th>
                </tr>
                <tr>
                	<th class="text-center" colspan="2"> HORA </th>
                	@foreach($dias as $dia)
	                  	<th class="text-center"> {{ $dia->dia }}</th>
                	@endforeach
                </tr>
            </thead>
            <tbody>
            	
            	@for($i = 0; $i < 9; $i++)
                    @if($i == 4)
                        <tr>    
                            <th class="text-center" colspan="7"> RECREO </th>
                        </tr>   
                    @else
    					<tr>
    						<td colspan="2" class="text-center"> {{ $horas[$i]->bloque }} </td>
    						
                            @for($j=0; $j < 5; $j++) 
                                
                                @if($i == 0)
                                    <th class="text-center"> SALUDO</th>
                                
                                @else
                                    <td class="text-center text-red"> 
                                    
                                    @if(asignados($bloques2[$i][$j]->id,$bloques_asignados))  
                                        {{ asignaturas_a($bloques2[$i][$j]->id, $asignaturas_asignadas[$i], $seccion->id) }}             
                                    @elseif(asignadas($bloques2[$i][$j]->id,$aulas_asignadas))

                                        <span class="fa fa-close"></span>

                                    @else
                                    
                                        <input type="checkbox" name="id_bloque[]" value="{{ $bloques2[$i][$j]->id }}" title="Seleccione el día correspondiente de la asignatura" id="id_bloque">
                                    
                                    @endif
                                
                                @endif
                            
                            @endfor
                            </td>
    					</tr>
                    @endif
				@endfor
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-3">
    {!! Form::hidden('id_curso', $curso->id) !!}
    {!! Form::hidden('id_seccion', $seccion->id) !!}
    {!! Form::hidden('id_asig', $asignatura->id) !!}
    {!! Form::hidden('id_aula', $aula->id) !!}
</div>
<div class="col-md-6"><br><br>
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <tbody>
                <tr>
                    <th class="text-center" colspan="3">LEYENDA</th>
                </tr>
                <tr>
                    <th style="width: 150px">ASIGNATURA</th>
                    <th></th>
                    <th style="width: 60px"> Periodo </th>
                </tr>
                <tr>
                    <td colspan="2">{{ $asignatura->asignatura }}</td>
                    <td class="pull-right"><span class="badge bg-green">2016</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12"><br><br>
	<div class="box-footer">
		<button type="reset" class="btn btn-default btn-flat">Cancelar</button>
	    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
	</div>
</div>