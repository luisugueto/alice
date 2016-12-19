<div class="col-md-4">
	<div class="box-body no-padding">
		<table class="table table-condensed">
			<tbody>
				<tr>
					<th style="width: 150px">ESTUDIANTE</th>
					<th></th>
					<th colspan="2" style="width: 60px">{{ $estudiante->codigo_matricula }}</th>
				</tr>
				<tr>
					<td>{{ $estudiante->apellidos }}</td>
					<td colspan="3">{{ $estudiante->nombres }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>		
<div class="col-md-6 pull-right">
	<div class="box-body no-padding ">
		<table class="table table-condensed">
			<tbody>
				<tr>
					<th style="width: 150px">REPRESENTANTE</th>
					<th></th>
					<th></th>
					<th style="width: 60px">{{ $representante->cedula_re }}</th>
				</tr>
				<tr>
					<td>{{ $representante->nombres_re }}</td>
					<td>{{ $representante->telefono_re }}</td>
					<td colspan="1" class="text-center">{{ $representante->direccion_re}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>		
<div class="col-md-12">
	<hr>
</div>
<div class="col-md-12">
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
                <tr>
                  	<th style="width: 10px"></th>
                  	<th>Nombre</th>
                  	<th>Vence </th>
                  	<th>Monto</th>
                  	<th>Deuda</th>
                  	<th>Creada</th>
                  	<th>Operación</th>
                </tr>
                @foreach($rubros as $rubros)
                <tr>
                  	<td><input type="checkbox" name="seleccionados[]" id="select"></td>
                  	<td> {{ $rubros->nombre }} </td>
                  	<td> {{ $rubros->fecha_max }} {{ $rubros->id }} </td>
                  	<td> {{ $rubros->monto }}</td>
                  	<td> </td>
                  	<td> {{ $rubros->created_at }}</td>
                  	<td class="text-center"> 
                  		 {!! link_to_route('rubros.edit', $title = '', $parameters = $rubros->id, $attributes = ['class'=>'fa fa-dollar']) !!}
                  	</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
	<div class="pull-right"><br><br>
		<button class="btn btn-primary" id="boton" disabled>Abonar</button>
	</div>	
</div>