
{{ Form::hidden('id_estudiante',$estudiantes->id) }}
@if($repite="SIN CARGAR TODAS")
	<div class="control-group">
		{!! Form::label('repite','NO HAN SIDO CARGADAS TODAS LAS CALIFICACIONES DEL ÚLTIMO PERIODO LECTIVO CURSADO') !!}
	</div>

@else
		@if($id_curso=="Todos")

			<div class="control-group">
				{!! Form::label('nuevo_ingreso','ESTUDIANTE NUEVO INGRESO') !!}
			</div>
			<div class="control-group">
				<div class="controls">
					{!! Form::label('becado','ESTÁ BECADO') !!}
					{!! Form::checkbox('becado','Si',false,['id' => 'becado','title' => 'Seleccione si el estudiante esta becado']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('cursos','Cursos', ['class' => 'control-label'])!!}
				<div class="controls">
					{!! Form::select('id_curso',$cursos,null,['class' => 'form-control','required' => 'required', 'placeholder' => 'SELECCIONE' , 'title' => 'Seleccione un Curso', 'id' => 'id_curso','onchange' => 'seccion()']) !!}
				</div>
			</div>
			<div class="control-group">
				{!! Form::label('seccion','Secciones', ['class' => 'control-label'])!!}
				<div class="controls">
					<select name="id_seccion" id="id_seccion" title="Seleccione la sección" required="required" class="form-control select">
					</select>
				</div>
			</div>

			<div id="id_rubros"></div>
		@else
			@if($id_curso=="Ninguno")
			<div class="control-group">
				{!! Form::label('repite','ESTUDIANTE APROBADO EN TODOS LOS CURSOS') !!}
			</div>
			@else
				
				<div class="control-group">
					{!! Form::label('nuevo_ingreso','ESTUDIANTE NUEVO INGRESO') !!}
				</div>
				<div class="control-group">
					<div class="controls">
						{!! Form::label('becado','ESTÁ BECADO') !!}
						{!! Form::checkbox('becado','Si',false,['id' => 'becado','title' => 'Seleccione si el estudiante esta becado']) !!}
					</div>
				</div>
				<div class="control-group">
					{!! Form::label('cursos','Cursos', ['class' => 'control-label'])!!}
					<div class="controls">
						{!! Form::text('id_curso',$cursos->id,['class' => 'form-control','required' => 'required', 'placeholder' => 'SELECCIONE' , 'title' => 'Seleccione un Curso', 'id' => 'id_curso','onchange' => 'seccion()']) !!}
					</div>
				</div>
				<div class="control-group">
					{!! Form::label('seccion','Secciones', ['class' => 'control-label'])!!}
					<div class="controls">
						<select name="id_seccion" id="id_seccion" title="Seleccione la sección" required="required" class="form-control select">
						</select>
					</div>
				</div>

				<div id="id_rubros"></div>

			@endif
		@endif
@endif