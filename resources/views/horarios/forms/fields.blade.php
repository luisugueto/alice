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

                                        {{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }}
                                                   
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

    {!! Form::hidden('id_curso', $curso->id) !!}
    {!! Form::hidden('id_seccion', $seccion->id) !!}
    {!! Form::hidden('id_asig', $asignatura->id) !!}
    {!! Form::hidden('id_aula', $aula->id) !!}

    <div class="col-md-5"><br>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
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
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="box-footer">
		<button type="reset" class="btn btn-default btn-flat">Cancelar</button>
	    <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
	</div>
</div>