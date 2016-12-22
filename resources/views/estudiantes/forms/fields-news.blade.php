<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('fecha', 'Fecha') !!}
		{!! Form::date('fecha', null, ['class' => 'form-control', 'title' => 'fecha de la novedad del estudiante']) !!}
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		{!! Form::label('detalles') !!}
		{!! Form::textarea('detalles', null, ['class' => 'form-control', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>