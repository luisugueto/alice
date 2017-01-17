{!! Form::hidden('id_prof',$docentes->id) !!}
{!! Form::hidden('cargo',$docentes->cargo->nombre) !!}

<div class="span4">
	<div class="form-group">
		{!! Form::label('cursos','Cursos')!!}
		{!! Form::select('id_curso',$cursos,null,['class' => 'form-control','required' => 'required', 'title' => 'Seleccione un Curso', 'id' => 'id_curso','onchange' => 'secciones()', 'placeholder' => 'SELECCIONE']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('seccion','Secciones')!!}
		<select name="id_seccion" id="id_seccion" title="Seleccione la sección" required="required" class="form-control select">
			
		</select>
	</div>
</div>