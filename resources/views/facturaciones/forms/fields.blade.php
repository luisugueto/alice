<div class="col-md-6">
	<div class="form-group">
		{!! Form::label('curso', 'Cursos') !!} <small class="text-red">*</small>
		{!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'title' => 'Debe seleccionar un curso', 'id' => 'id_curso','onchange' => 'seccion()']) !!}
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		{!! Form::label('nombres', 'Nombres') !!}
		{!! Form::text('nombres', $estudiante->nombres.' '.$estudiante->apellidos, ['class' => 'form-control', 'disabled']) !!}
	</div>
</div>
{!! Form::hidden('id_estudiante', $estudiante->id) !!}
<div id="id_rubros">