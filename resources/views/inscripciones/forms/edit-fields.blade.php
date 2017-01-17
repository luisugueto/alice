<div class="control-group">
	<div class="controls">
		{!! Form::label('repite','CURSO: '.$inscripciones->curso) !!}
	</div>
</div>
	{{ Form::hidden('id_estudiante', $estudiantes->id) }}
<div class="control-group">
	<div class="controls">
		{!! Form::label('repite','SECCIÓN ACTUAL: '.$inscripciones->literal) !!}
	</div>
</div>
<div class="control-group">
	<div class="controls">
		{!! Form::label('seccion','SECCIONES')!!}
		{!! Form::select('id_seccion',$secciones,null,['class' => 'form-control','title' => 'Seleccione la sección a la que desea cambiar al estudiante'])  !!}
	</div>
</div>