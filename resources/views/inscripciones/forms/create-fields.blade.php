<div class="tab-pane active" id="tab_1">
	<div class="box-body">
	{{ Form::hidden('id_estudiante',$estudiantes->id) }}
	@if($estado=="Nuevo Ingreso")


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




	@endif
	<div class="col-md-12"><br>
		<div class="box-footer">
			
			<button type="submit" class="btn btn-primary btn-flat">Inscribir</button>

		</div>
	</div>
	</div>
</div>