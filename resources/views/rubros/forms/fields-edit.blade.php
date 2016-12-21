<div class="box-body">
	<div class="col-md-12">
		{!! Form::label('modalidad', 'Modalidades de Pago') !!}
		{!! Form::select('id_modalidad', $modalidad, null,  ['class' => 'form-control', 'id' => 'id_modalidad', 'onchange' => 'modalidad()']) !!}
	</div>
	<div class="col-md-12">
		<hr>
	</div>
	<div class="col-md-12">
		@foreach($formas_pago as $formas)
			<div class="form-group">     
		        <?php if($formas->forma=='Efectivo'){ ?>
		        {!! Form::checkbox('id_forma[]', $formas->id,true,['onchange' => 'bloqueos2()','id' => 'id_forma']) !!}
		        <?php }else{ ?>
		        {!! Form::checkbox('id_forma[]',$formas->id,false,['onchange' => 'bloqueos2()','id' => 'id_forma']) !!}
		        <?php } ?>
		        {{ strtoupper($formas->forma) }}
		    </div>
		@endforeach

		<div class="form-group">
			{!! Form::label('nro_transferencia', 'Nro. de Transferencia') !!}
			{!! Form::number('nro_transferencia', null, ['class' => 'form-control', 'placeholder' => '316600804465', 'title' => 'Aqui debe colocar el nro de la transferencia en caso dado de que la forma de pago incluya una transferencia', 'id' => 'nro_transferencia', 'disabled' => 'disabled'])  !!}
		</div>

		<div class="form-group">
			{!! Form::label('nro_cheque', 'Nro. de Cheque') !!}
			{!! Form::text('nro_cheque', null, ['class' => 'form-control', 'placeholder' => '011234567 001234567', 'title' => 'Aqui debe colocar el nro del cheque en caso dado de que la forma de pago incluya un cheque', 'id' => 'nro_cheque','disabled' => 'disabled'])  !!}
		</div>

		<div class="form-group">
			{!! Form::label('Monto', 'Monto a Pagar') !!}
			{!! Form::number('monto_pagar', null, ['class' => 'form-control','required' => 'required', 'placeholder' => '100', 'title' => 'Aqui debe colocar la cantidad a pagar o a abonar, la cual no debe ser mayor al monto de deuda', 'disabled' => 'disabled', 'min' => '1', 'max' => $rubros->monto])  !!}
		</div>
		{!! Form::hidden('id_estudiante', $rubros->estudiante->id) !!}
	</div>
	<div class="col-md-12"><br>
		<div class="box-footer">
			<button type="reset" class="btn btn-default btn-flat">Cancelar</button>
			<button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
		</div>
	</div>
</div>