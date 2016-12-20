<div class="col-md-12">
    <div class="box-body no-padding">
        <table class="table table-bordered">
            <thead>
                <tr>
                	<th class="text-center" colspan="2"> NOMBRE </th>
                	@foreach($dias as $dia)
	                  	<th class="text-center"> {{ $dia->dia }}</th>
                	@endforeach
                </tr>
            </thead>
            <tbody>
            	
            	@for($i = 0; $i < 7; $i++)
					<tr>
						<td colspan="2" class="text-center"> {{ $horas[$i]->bloque }} </td>
						@for($j=0; $j < 5; $j++)
							<td class="text-center">  <input type="checkbox" name="id_bloque[]" value="{{ $bloques2[$i][$j]->id }}" title="{{ $bloques2[$i][$j]->id }}"></td>
						@endfor
					</tr>
						
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