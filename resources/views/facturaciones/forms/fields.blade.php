<div class="span11">
	<div class="span4">
		<div class="control-group">
			{!! Form::label('curso', 'Cursos', ['class' => 'control-label']) !!}
			<div class="controls">
				{!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'title' => 'Debe seleccionar un curso', 'id' => 'id_curso','onchange' => 'seccion()']) !!}
			</div>
		</div>
	</div>

	{!! Form::hidden('id_estudiante', $estudiante->id) !!}
	<div id="id_rubros"></div>
</div>