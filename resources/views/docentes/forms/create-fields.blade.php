<div class="box-body">
	{!! Form::hidden('id_prof',$docentes->id) !!}
	{!! Form::hidden('cargo',$docentes->cargo->nombre) !!}
	@if($docentes->cargo->nombre=="DOCENTE DE PLANTA")

	<div class="form-group">
		{!! Form::label('cursos','Cursos')!!}
		{!! Form::select('id_curso',$cursos,null,['class' => 'form-control','required' => 'required', 'title' => 'Seleccione un Curso', 'id' => 'id_curso','onchange' => 'secciones()']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('seccion','Secciones')!!}
		<select name="id_seccion" id="id_seccion" title="Seleccione la sección" required="required" class="form-control select">
			
		</select>
	</div>


	@else
		<div class="form-group">
		{!! Form::label('cursos','Cursos')!!}
		{!! Form::select('id_curso',$cursos,null,['class' => 'form-control','required' => 'required', 'title' => 'Seleccione un Curso', 'id' => 'id_curso','onchange' => 'secciones2()']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('seccion','Secciones')!!}
		<select name="id_seccion2" id="id_seccion2" title="Seleccione la sección" required="required" class="form-control select">
			
		</select>
	</div>

	<div class="form-group">
		{!! Form::label('asignaturas','Asignaturas')!!}
		<select name="id_asignatura" id="id_asignatura" title="Seleccione la asignatura" required="required" class="form-control select">
			
		</select>
	</div>


	@endif

</div>
