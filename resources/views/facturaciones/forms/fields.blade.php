<?php $i = 0; ?>

<div class="span11">

	{!! Form::hidden('id_estudiante', $estudiante->id) !!}

	@if(date('d') == ('1'||'2'))
		<div><legend>Descuento Pronto Pago <input type="checkbox" name="descontarMensualidad" value="{{ $descontarMensualidad->cantidad }}">&nbsp; {{ $descontarMensualidad->cantidad }} $</legend></div>
	@endif

	<table class="table table-bordered">
        <thead>

            <tr>
            	<th></th>
                <th>NOMBRE</th>
                <th>MONTO</th>
                <th style="width: 250px;">FECHA MAX. DE PAGO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rubros as $rubro)

                @if(!buscarRubro($rubro->id, $estudiante->id))

                    <tr>
                    	<td style="text-align: center;"><input type="checkbox" id="id_rubro" name="id_rubro[]"" value="{{ $rubro->id }}"></td>
                       	<td>{{ $rubro->nombre }}</td>
                        <td>{{ $rubro->monto }}</td>
                        <td>{{ $rubro->fecha }}</td>
                    </tr>

                    <?php $i++ ?>

                @endif

            @endforeach

            @if($i > 0)
                <tr>
                    <td colspan="4"><button type="reset" class="btn btn-default btn-flat">Cancelar</button><button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button></td>
                </tr>
            @else
                <tr>
                    <td colspan="4" style="text-align: center;"> No hay rubros disponibles </td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
