<div class="tab-pane active" id="tab_1">
	<div class="box-body">
	{{ Form::hidden('id_estudiante',$estudiantes->id) }}
	
	
	<div class="form-group">
		{!! Form::label('repite','Curso: '.$inscripciones->curso) !!}
	</div>

	<div class="form-group">
		{!! Form::label('repite','Sección Actual: '.$inscripciones->literal) !!}
		
	</div>
	


	<div class="form-group">
		{!! Form::label('seccion','Secciones')!!}
		{!! Form::select('id_seccion',$secciones,null,['class' => 'form-control','title' => 'Seleccione la sección a la que qdesea cambiar al estudiante'])  !!}
			
		</select>
	</div>


	<div class="col-md-12"><br>
		<div class="box-footer">
			
			<button type="submit" class="btn btn-primary btn-flat">Cambiar Sección</button>

		</div>
	</div>
	</div>
</div>